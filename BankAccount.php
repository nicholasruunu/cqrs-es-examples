<?php

/**
 * Aggregate Root
 */
final class BankAccount extends AggregateRoot
{
    private $id;
    private $amount;

    public function deposit($amount)
    {
        $this->apply(new DepositWasMade($this->id, $amount));
    }

    public function withdraw($amount)
    {
        if ($amount - $this->amount > 100) {
            throw new InsufficientFunds;
        }

        $this->apply(new WithdrawalWasMade($this->id, $amount));

        if ($amount > $this->amount) {
            $this->apply(new AccountOverdrafted($this->id, $amount - $this->amount));
        }
    }

    private function whenDepositWasMade(DepositWasMade $event)
    {
        $this->amount += $event->amount();
    }

    private function whenWithdrawalWasMade(WithdrawalWasMade $event)
    {
        $this->amount -= $event->amount();
    }
}

<?php

/**
 * Event
 */
final class DepositWasMade extends DomainEvent
{
    private $accountId;
    private $amount;

    public function __construct($accountId, $amount)
    {
        $this->accountId = $accountId;
        $this->amount = $amount;
    }

    public function accountId()
    {
        return $this->accountId;
    }

    public function amount()
    {
        return $this->amount;
    }
}

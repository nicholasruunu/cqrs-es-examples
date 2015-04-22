<?php

/**
 * Command
 */
final class MakeDeposit
{
    private $accountId;
    private $amount;

    public function __construct($accountId, $amount)
    {
        $this->accountId = $accountId;
        $this->amount = $amount;
    }

    public function amount()
    {
        return $this->amount;
    }
}

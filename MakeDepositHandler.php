<?php

/**
 * CommandHandler
 */
final class MakeDepositHandler
{
    private $eventStore;

    public function __construct(EventStore $eventStore)
    {
        $this->eventStore = $eventStore;
    }

    public function handleMakeDeposit(MakeDeposit $command)
    {
        $events = $this->eventStore->fromId($command->accountId());

        $account = (new BankAccount)->buildFromHistory($events);

        $account->deposit($command->amount());

        $this->eventStore->save($account);
    }
}

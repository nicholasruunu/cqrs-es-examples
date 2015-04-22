<?php

abstract class AggregateRoot
{
    private $events;

    public function apply(DomainEvent $event)
    {
        $this->events[] = $event;
        $this->handle($event);
    }

    private function handle(DomainEvent $event)
    {
        // Execute $this->when{$eventClassName} if exist
    }

    public function buildFromHistory(DomainEvents $events)
    {
        foreach ($events as $event) {
            $this->handle($event);
        }
    }

    public function releaseEvents()
    {
        $events = $this->events;
        $this->events = [];

        return new DomainEvents($events);
    }
}

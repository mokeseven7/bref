<?php

require __DIR__ . '/vendor/autoload.php';

use Bref\Context\Context;
use Bref\Event\Sqs\SqsEvent;
use Bref\Event\Sqs\SqsHandler;

class Handler extends SqsHandler
{
    public function handleSqs(SqsEvent $event, Context $context): void
    {
        var_dump($event);
        var_dump($context);

        foreach ($event->getRecords() as $record) {
            // We can retrieve the message body of each record via `->getBody()`
            $body = $record->getBody();

            // do something
        }
    }
}

return new Handler();

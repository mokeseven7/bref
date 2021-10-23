<?php

require __DIR__ . '/vendor/autoload.php';

use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class HttpHandler implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        /** @var $event Bref\Event\Http\HttpRequestEvent */
        $event = $request->getAttribute('lambda-event'); 
        var_dump($event);
        
        /** @var $context Bref\Context\Context */
        $context = $request->getAttribute('lambda-context');
        var_dump($context);
        
        $name = $request->getQueryParams()['name'] ?? 'world';

        return new Response(200, [], "Hello $name");
    }
}

return new HttpHandler();
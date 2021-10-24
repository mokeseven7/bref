<?php

require __DIR__ . '/vendor/autoload.php';

use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Popcorn\Serverless\Api;


class HttpHandler implements RequestHandlerInterface
{

    public function __construct(Api $api)
    {
        $this->api = $api;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $res = [];

        /** @var $event Bref\Event\Http\HttpRequestEvent */
        $res['event'] = $request->getAttributes(); 
        $res['name'] = $request->getQueryParams()['name'] ?? 'world';
        $res['cookies'] = $request->getCookieParams();

        $data = array_merge($res, $this->api->debuginfo());

        return new Response(200, [], $data);
    }
}

return new HttpHandler(new Api);
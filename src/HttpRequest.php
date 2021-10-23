<?php

namespace Popcorn\Serverless;

use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class HttpHandler implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {

        //Getting a param value from request url
        $id = $request->getAttribute('id', '00001');

        //Getting a Query Param
        $name = $request->getQueryParams()['name'] ?? 'world';

        return new Response(200, [], "Hello $name");
    }


    public function input(){
        $attributes = $re
    }
}

return new HttpHandler();

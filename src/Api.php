<?php

namespace Popcorn\Serverless;

class Api 
{

    public $debugContext = [];
    public $debugRequestContext = [];

    /**
     * Helper Function To Return All the Request And Event Context Properties
     * @return array 
     */
    public function debuginfo(){
        $lambdaContext = json_decode($_SERVER['LAMBDA_INVOCATION_CONTEXT'], true);
        
        foreach($lambdaContext as $key => $context){
            $this->debugContext[$key] = $context;
        }


        $requestContext = json_decode($_SERVER['LAMBDA_REQUEST_CONTEXT'], true);

        foreach($requestContext as $reqKey => $requestContext){
            $this->debugContext[$reqKey] = $requestContext;
        }

        return array_merge($this->debugContext, $this->debugRequestContext);
    }
}


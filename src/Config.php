<?php

namespace Popcorn\Serverless;

class Config {

    protected $config;

    public function value($key, $value, $default = null){
        $this[$key] = $value;
    }

    
}
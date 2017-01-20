<?php

namespace IamBot;

class Config
{
  
    public function __construct($dotenv)
    {
    
        // DotEnv configuration
        $dotenv = new Dotenv\Dotenv(__DIR__);
        $dotenv->load();
    }
}
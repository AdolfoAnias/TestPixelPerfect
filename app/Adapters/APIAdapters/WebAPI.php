<?php

namespace App\Adapters\APIAdapters;

use File;

class WebAPI
{
    private $client;

    public function __construct($client)
    {
        $this->client = $client;
    }

    public function getPasswordGenerated()
    {
        $response = $this->client->get("/api/v1/alphanumeric/json?c=1&l=12")->getBody();
        $data = json_decode($response);
        return $data;
    }    
}

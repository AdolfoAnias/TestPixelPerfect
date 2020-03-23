<?php

namespace App\Helpers;

use App\Adapters\APIAdapters\WebAPI;

class WebAPIHelper {
    private $api;

    function __construct(WebAPI $api)
    {
        $this->api = $api;
    }

    public function getPasswordGenerated()
    {
        return $this->api->getPasswordGenerated();
    }

}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\WebAPIHelper;

class GeneralController extends Controller
{
    private $webApiHelper;
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(WebAPIHelper $webApiHelper) {
        $this->webApiHelper = $webApiHelper;
    }

    public function passGenerator()
    {
        $passwordGenerated = $this->webApiHelper->getPasswordGenerated();       
        
        return $passwordGenerated->pws;
    }
    
}

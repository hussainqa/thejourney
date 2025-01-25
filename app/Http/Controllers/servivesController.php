<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\service;

class servivesController extends Controller
{

    public function getservice($key){
        $service = service::where('key',$key);
        return $service;
    }

    
}

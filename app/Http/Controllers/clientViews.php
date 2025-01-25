<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\service;
use App\Models\subService;
use App\Models\Slide;
use App\Models\HomeContent;
use App\Models\Customers;
use App\Models\AboutContent;
use App\Models\Plan;


class clientViews extends Controller
{

    public function home(){

        $content = HomeContent::find(1);
        $services = service::all();
        $slides = Slide::all();
        $customers = Customers::all();
        $solutions = subService::all();
        foreach ($services as $service) {
            $solutionsForService = [];
        
            foreach ($solutions as $solution) {
                if ($solution->service_key == $service->key) {
                    $solutionsForService[] = [
                        'name' => $solution->name,
                        'icon' => $solution->icon,
                        'key' => $solution->sub_key
                    ];
                }
            }
        
            $service['solutions'] = $solutionsForService;
        }
        

        // dd($services);
        return view('home',[ 'services' => $services ,
         'slides' => $slides , 'content' => $content , 'customers' => $customers]);

    }

    public function solution($service, $solution) {
        
        $solution = subService::where('sub_key', $solution)->where('service_key', $service)->first();
        $serviceName = service::where('key', $service)->value('title');

        if(!$solution){
            return view('notfound');
        }

        return view('solution', ['solution' => $solution , 'serviceName' => $serviceName]);
    }

    public function aboutus(){
        $content = AboutContent::find(1);
        return view('aboutus', ['content' => $content]);
    } 

    public function pricing(){
        $plans = Plan::all();
        return view('pricing', ['plans' => $plans]);
    } 
}

<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\data;
use App\Models\company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($type,$resturant)
    {
        $company=DB::table('companies')->select('*')->where('UrlName','=',$resturant)->where('type','=',$type)->get()->first();

        return view('company.home',['company'=>$company]);
    }
   public function index_new($type,$resturant)
    {
        $company=DB::table('companies')->select('*')->where('UrlName','=',$resturant)->where('type','=',$type)->get()->first();

        return view('company.form',['company'=>$company]);
    }
   public function index_new_dark($type,$resturant)
    {
        $company=DB::table('companies')->select('*')->where('UrlName','=',$resturant)->where('type','=',$type)->get()->first();

        return view('company.form_dark',['company'=>$company]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        dd($request);
        return redirect()->route('ShowCode');
    }
    public function show_code(){
        $code = DB::table('hotspot-codes')->inRandomOrder()->value('code');
        return view('company.code',['code'=>$code]);
    }
    public function show_code_id(string $CompanyId){
        
        $code = DB::table('hotspot-codes')->where('company_id',$CompanyId)->inRandomOrder()->value('code');
        return view('company.code_id',['code'=>$code]);
    }
    public function show_code_id_dark(string $CompanyId){
        
        $code = DB::table('hotspot-codes')->where('company_id',$CompanyId)->inRandomOrder()->value('code');
        return view('company.code_id_dark',['code'=>$code]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Company=company::where('UrlName',$request->companyName )->first();
        
        $data=new data([
            'data_1'=>$request->CostumerName,
            'data_2'=>$request->CostumerNumber,
            'company_id'=>$Company->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),


        ]);
        $data->save();

        return redirect()->route('ShowCode');
    }
    public function store_new(Request $request)
    {
        $Company=company::where('UrlName',$request->companyName )->first();
        $data=new data([
            'data_1'=>$request->CostumerName,
            'data_2'=>$request->CostumerNumber,
            'company_id'=>$Company->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),


        ]);
        $data->save();
        if ($request->dark == 1) {
        return redirect()->route('ShowCodeIdDark', ['CompanyId' => $Company->id]);
        } else {
        return redirect()->route('ShowCodeId', ['CompanyId' => $Company->id]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $type,string $resturant,string $id,)
    {
        $company=DB::table('companies')->select('*')->where('UrlName','=',$resturant)->where('type','=',$type)->get()->first();
        if($id=='1')
        {
            $ad=$company->ad_1;
        }elseif($id=='2')
        {
            $ad=$company->ad_2;
        }elseif($id=='3')
        {
            $ad=$company->ad_3;
        }
        return view('company.advert',['ad'=>$ad]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

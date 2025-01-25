<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\data;
use App\Models\company;
use Illuminate\Http\Request;
use App\Exports\DataDateExport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class HostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function profile()
    {
        $authenticatedUser = session('authenticated_user');
        $Company=company::find($authenticatedUser->company_id);

        return view('Host.profile',['Host'=>$authenticatedUser,'Company'=>$Company]);
    }
    public function index()
    {
        return view('Host.Home');
    }
    public function logout()
{
    Auth::guard('host')->logout();

    Session::flush(); // Flush the entire session

    // Perform any other necessary cleanup or redirection

    return redirect('Hostlogin'); // Redirect to desired page after logout
}

    public function Data_Date(Request $request)
    {

        // $CompanyId=10;
        $CompanyId=Session::get('CompanyId');

        $start_date=$request['start_date'];
        $end_date=$request['end_date'];

        $results = data::DateRange($start_date, $end_date, $CompanyId)->get();

        return view('Host.Data',['Data'=>$results,'start_date'=>$start_date,'end_date'=>$end_date]);

    }
    public function Data_Date_Download(Request $request)
    {
        $CompanyId=Session::get('CompanyId');

        $company = company::find($CompanyId);

        $dataExport = new DataDateExport($request['start_date'],$request['end_date'],$CompanyId);
        $fileName = $company->UrlName . '_data_' . Carbon::now()->format('Y-m-d-H-i-s') . '.xlsx';
        // dd($fileName);
        // Generate the Excel file and store it in a temporary location
        Excel::store($dataExport, 'temp/' . $fileName);

        // Get the file path of the stored Excel file
        $tempFilePath = storage_path('app/temp/' . $fileName);

        // Check if the file exists
        if (!Storage::exists('temp/' . $fileName)) {
            abort(404, 'File not found');
        }

        $mimeType = Storage::mimeType('temp/' . $fileName);
        $headers = [
            'Content-Type' => $mimeType,
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
        ];

        return response()->download($tempFilePath, $fileName, $headers);





        $start_date=$request['start_date'];
        $end_date=$request['end_date'];

        $results = data::DateRange($start_date, $end_date, $CompanyId)->get();

        return view('Host.Data',['Data'=>$results,'start_date'=>$start_date,'end_date'=>$end_date]);

    }
    public function index_data()
    {
        $end_date = date('Y-m-d'); // Current date in 'YYYY-MM-DD' format

// Calculate the start date one month before the current day
        $start_date = date('Y-m-d', strtotime('-1 month', strtotime($end_date)));
        $CompanyId=Session::get('CompanyId');
        $company=company::find($CompanyId);
        $results = data::DateRange($start_date, $end_date, $CompanyId)->get();


        return view('Host.Data',['Data'=>$results,'start_date'=>$start_date,'end_date'=>$end_date]);
    }

    public function index_ad(string $id)
    {
        $columnName = 'ad_' . $id;
        $CompanyId=Session::get('CompanyId');
        $Company=DB::table('companies')->select('*')->where('id',$CompanyId)->first();
        $Host=DB::table('hosts')->select('*')->where('company_id',$CompanyId)->first();
        if($Host)
        {
            $property = "ad_{$id}_access";
            $propertyCompany="ad_{$id}";

            if($Host->$property == 1)
            {
                return view('Host.Ad',['AD'=>$Company->$propertyCompany]);
            }else
            {
                $adNumAccessValues = [];
        if($Host)
        {
            $adNumAccessValues = [];
            for ($i = 1; $i <= 5; $i++) {
                $property = "ad_{$i}_access";
                $propertyCompany="ad_{$i}";
                $adNumAccessValues[] = $Host->$property;
                $adNumAccessValues[] = $Company->$propertyCompany;
            }

        }else
        {
            for ($i = 1; $i <= 5; $i++) {
                $propertyCompany="ad_{$i}";
                $adNumAccessValues[] = $Company->$propertyCompany;
            }
        }

        return view('Host.AllAds',['ADS'=>$adNumAccessValues]);}

        }else
        {
            return view('Host.Ad');
        }

    }
    public function index_total_ads()
    {

        $CompanyId=Session::get('CompanyId');
        $Company=DB::table('companies')->select('*')->where('id',$CompanyId)->first();
        $Host=DB::table('hosts')->select('*')->where('company_id',$CompanyId)->first();

        $adNumAccessValues = [];
        if($Host)
        {
            $adNumAccessValues = [];
            for ($i = 1; $i <= 5; $i++) {
                $property = "ad_{$i}_access";
                $propertyCompany="ad_{$i}";
                $adNumAccessValues[] = $Host->$property;
                $adNumAccessValues[] = $Company->$propertyCompany;
            }

        }else
        {
            for ($i = 1; $i <= 5; $i++) {
                $propertyCompany="ad_{$i}";
                $adNumAccessValues[] = $Company->$propertyCompany;
            }
        }

        return view('Host.AllAds',['ADS'=>$adNumAccessValues]);
    }
    public function showChangePasswordForm()
    {
        return view('Host.change-password');
    }

 public function changePassword(Request $request)
    {
        $authenticatedUser = session('authenticated_user');
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',        ]);

        if (Hash::check($request->old_password, $authenticatedUser->password)) {
            $authenticatedUser->update([
                'password' => Hash::make($request->new_password),
            ]);

            return redirect()->route('password.change')->with('success', 'Password changed successfully.');
        } else {
            return redirect()->route('password.change')->with('error', 'Old password is incorrect.');
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $CompanyId=Session::get('CompanyId');
        $Company = company::find($CompanyId);

        // $Company=DB::table('companies')->select('*')->where('id',$CompanyId)->first();
        $ad="ad_$id";

        if ($request->hasFile('AdPhoto')) {
             $old_path_ad=pathinfo($Company->$ad   , PATHINFO_FILENAME);
            //  dd($old_path_ad);
             $extension_ad = $request->file('AdPhoto')->getClientOriginalExtension();



                 Storage::delete($Company->$ad);
                //  $ad1Path = $request->file('AdPhoto')->storeAs('Adverts', $old_path_ad . '.' . $extension_ad,'public');
                $ad1Path = $request->file('AdPhoto')->storeAs('Adverts', $old_path_ad ,'public');

                $Company->$ad = $ad1Path;

    }else {
        $Company->$ad=$request['AdPhoto'];
    }
    $Company->save();
    return redirect('DashboardHost/TotalAds')->withSuccess('Login details are not valid');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

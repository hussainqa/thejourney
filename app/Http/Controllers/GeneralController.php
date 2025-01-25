<?php


namespace App\Http\Controllers;
use App\Models\type;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Console\Application;
use Symfony\Component\HttpFoundation\RedirectResponse;

class GeneralController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login(Request $request): Redirector|Application|RedirectResponse
    {
        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])){
            $Host=Auth::guard('admin')->user();
            session(['admin_user' => $Host]);

            return redirect()->route('Dashboard');

           }elseif(Auth::guard('host')->attempt(['email' => $request->email, 'password' => $request->password])){
            $userId = Auth::guard('host')->id(); // Retrieve the ID of the logged-in user
            $Host=Auth::guard('host')->user();
            session(['authenticated_user' => $Host]);

            
            $CompanyId=DB::table('hosts')->select('company_id')->where('id',$userId)->get()->first();
            Session::put('CompanyId', $CompanyId->company_id);
            return redirect()->route('Dashboard-Host');
           }else
           {
                return redirect("Hostlogin")->withSuccess('Login details are not valid');
           }
    }
    public function index()
    {
        //
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

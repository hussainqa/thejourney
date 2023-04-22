<?php

namespace App\Http\Controllers;

use App\Models\type;
use Illuminate\Routing\Redirector;
use Symfony\Component\Console\Application;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class AdminController extends Controller
{
    public function login(Request $request): Redirector|Application|RedirectResponse
    {
        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])){
         return redirect()->route('Dashboard');

        }
        return redirect("login")->withSuccess('Login details are not valid');

    }
    public function companyform()
    {
        $types=type::all();
        return view('ADMIN.AddCompany',['Types'=>$types]);
    }
    public function index()
    {
        return view('ADMIN.dashboard');
    }

}

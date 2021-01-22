<?php

namespace App\Http\Controllers\Master;

use Illuminate\Support\Facades\{Input,Auth};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use DB,Redirect;

class AuthController extends Controller
{
    //use AuthenticatesUsers;


    public function login()
    {
        return view('services.admin.login');
    }

    public function postLogin(Request $request)
    {
        if(Auth::attempt($request->only('nip','password'))){
            $account = DB::table('users')->where('nip', $request->nip)->first();

            if($account->role == 'Administrator'){
                Auth::guard('Administrator')->LoginUsingId($account->id);
                return redirect();
            }
        }
    }

    public function logout()
    {
        if(Auth::guard('admin')->check())
        {
            Auth::guard('admin')->logout();
        }

        else if(Auth::guard('user')->check()){
            Auth::guard('user')->logout();
        }
    }
}

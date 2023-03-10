<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\LoginNotification;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {   
        $input = $request->all();
   
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
   
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            if (auth()->user()->roles_id == 1) {
                return redirect()->route('admin.pendaftar.jadwal.pembayaran.prodi');
            }else{
                $user = User::where('email', $input['email'])->first();
                $admin = User::where('roles_id', 1)->get();
                Notification::send($admin, new LoginNotification($user));
                return redirect()->route('home');
            }
        }else{
            return redirect()->route('login')
                ->with('email','Email-Address And Password Are Wrong.');
        }
          
    }

}
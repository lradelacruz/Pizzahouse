<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        Log::create([
            'username' => $user->name,
            'ip' => $request->ip(),
            'activity' => 'Login',
        ]);
    }

    public function logout(Request $request)
    {
        $user = Auth::user();
    
        if ($user) {
            Log::create([
                'username' => $user->name,
                'ip' => $request->ip(),
                'activity' => 'Logout',
            ]);
        }
    
        $this->guard()->logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return $this->loggedOut($request) ?: redirect('/');
    }
}

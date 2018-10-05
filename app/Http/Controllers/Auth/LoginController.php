<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

// Request & Response
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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


    protected $redirectTo = '/';


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Get the failed login response instance.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function sendFailedLoginResponse(Request $request)
    {

        if ($request->ajax()) {
            return response()->json([
                'error' => trans('auth.failed')
            ], 401);
        }

        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors([
                $this->username() => trans('auth.failed'),
            ]);
    }

    /**
     * Redirect the user after determining they are locked out.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function sendLockoutResponse(Request $request)
    {
        $seconds = $this->limiter()->availableIn(
            $this->throttleKey($request)
        );

        $message = trans('auth.throttle', ['seconds' => $seconds]);

        if ($request->ajax()) {
            return response()->json([
                'error' => $message
            ], 401);
        }

        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors([$this->username() => $message]);
    }

    protected function authenticated($request, $user)
    {
        if ($user->is_admin === 'YES') {
            return redirect()->intended('/admin');
        }
        if ($user->is_active === 'YES') {
            return redirect()->intended('/user/dashboard');
        }
        return redirect()->intended('/user/' . $user->username);
    }
}

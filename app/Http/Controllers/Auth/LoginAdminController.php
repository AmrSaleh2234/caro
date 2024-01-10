<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
//use \Illuminate\Support\Facades\View;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use DB;
class LoginAdminController extends Controller {
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

//    protected $redirectTo = '/admin';
    private function checkActive() {
        if (!Auth::user()->isActive()) {
            Auth::logout();
        }
    }
    private function checkType() {
        if (!Auth::user()->isType()) {
            Auth::logout();
        }
    }
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $admin_panel = DB::table('settings')->where('key', 'admin_url')->value('value');
        if($admin_panel == '' || $admin_panel == NULL){
        $admin_panel = 'admin';
        }
        $this->redirectTo = '/'.$admin_panel;
        $this->middleware('guest', ['except' => 'logout']);

    }

   protected function credentials(Request $request)
   {
              $field = filter_var($request->get($this->username()), FILTER_VALIDATE_EMAIL)
           ? $this->username()
           : 'phone';
       return [
           $field => $request->get($this->username()),
           'password' => $request->password,
       ];
   }
    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm() {
        session()->put('url.intended', url()->previous());
        // $admin_language = DB::table('settings')->where('key', 'admin_language')->value('value');
        // if ($admin_language != "en") {
        //     $admin_language = "ar";
        // }
        // app()->setLocale($admin_language);
        return view('admin.pages.login');
    }

    public function authenticated($request, $user) {
        return redirect(session()->pull('url.intended', $this->redirectTo));

    }


    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function login(Request $request) {
        $this->validateLogin($request);

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }
        if ($this->attemptLogin($request)) {
            $this->checkActive();
            $this->checkType();
            return $this->sendLoginResponse($request);
        }


        $this->incrementLoginAttempts($request);
        return $this->sendFailedLoginResponse($request);
    }

    public function logout(Request $request) {
        $this->guard()->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect($this->redirectTo);
    }

}

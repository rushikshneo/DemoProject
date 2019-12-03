<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;
use App\User;
use Session; 
use Socialite;

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

    public function login_custom(Request $request){
        if(Auth::attempt([
                    'email'=> $request->email,
                    'password'=>$request->password,
            ])){
                    $user = User::Where('email',$request->email)->first();
                      if($user->is_admin() && $user->is_active())
                      {   
                        Session::put('AdminSession',true);
                        return  redirect('/');
                      }else{
                        Auth::logout();
                        return  redirect()->route('login')->with('error','You do not admin access Please contact Admin .');
                      }
              }else{
                 return  redirect()->route('login')->with('error','Please Cheack your password or username.');
             }

    }

    // public function login(Request $request)
    // {
    //     $user = User::where('email', $request->{$this->username()})
    //               ->where('password',md5($request->password))
    //               ->where('status',1)
    //               ->first();
    //      Auth::login($user);
    //     return redirect('/');
    // }

     protected function credentials(\Illuminate\Http\Request $request)
    {
        return ['email' => $request->{$this->username()}, 'password' => $request->password, 'status' => 1];
    }

     protected function sendFailedLoginResponse(\Illuminate\Http\Request $request)
    { 
        $notactive = "Credentials is Not Active Please Contect Admin.";
        return view('auth.login',compact('notactive'));
        // return redirect('/login')->with(compact('notactive'));    
    }

     public function render($request, Exception $exception)
   {
    if ($exception instanceof CustomException) {
        return response()->abort(403, 'Unauthorized action.');
      }

    return parent::render($request, $exception);
   }
}

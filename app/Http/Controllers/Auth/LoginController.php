<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

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
    protected $redirectTo = 'top';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
//足した
    public function showLoginForm(Request $request)
    {
        $username = $request->session()->get('username');
        return view('auth.login', ['username' => $username]);
    }

    public function login(Request $request){
        if($request->isMethod('post')){

            $data=$request->only('mail','password');

            if (Auth::attempt($data)) {
                $user = Auth::user(); // ログイン成功後、認証されたユーザーを取得
                $request->session()->put('username', $user->username);
            // ログインが成功したら、トップページへ
            //↓ログイン条件は公開時には消すこと
            return redirect('top');
            }else {
                // ログイン失敗時の処理
                return back()->withErrors([
                    'email' => 'メールアドレスまたはパスワードが間違っています。',
                ])->withInput($request->only('mail'));
            }
        }
        return view("auth.login");
    }
    //ログアウト機能
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}

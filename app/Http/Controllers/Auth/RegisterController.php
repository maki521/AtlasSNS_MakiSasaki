<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register(Request $request)
        {

        if($request->isMethod('post')){
            //post送信時の処理
            //バリデーションここに挿入する
            $this->validate($request, [
                'username' => 'required|string|min:2|max:12',
                'mail' => 'required|string|email|max:40|unique:users',
                'password' => 'required|string|alpha_num|min:8|max:20|confirmed',
            ], [
                 'username.required' => 'ユーザー名を入力してください。',
                 'username.string' => 'ユーザー名は文字で入力してください。',
                 'username.min' => 'ユーザー名は2文字以上で入力してください。',
                 'username.max' => 'ユーザー名は12文字以内で入力してください。',
                 'mail.required' => 'メールアドレスを入力してください。',
                 'mail.string' => 'メールアドレスは文字で入力してください。',
                 'mail.email' => '正しい形式のメールアドレスを入力してください。',
                 'mail.max' => 'メールアドレスは40文字以内で入力してください。',
                 'mail.unique' => 'そのメールアドレスは既に使用されています。',
                 'password.required' => 'パスワードを入力してください。',
                 'password.string' => 'パスワードは文字で入力してください。',
                 'password.alpha_num' => 'パスワードは英数字で入力してください。',
                 'password.min' => 'パスワードは8文字以上で入力してください。',
                 'password.max' => 'パスワードは20文字以内で入力してください。',
                 'password.confirmed' => 'パスワードとパスワード確認が一致しません。',
                ]);

            $username = $request->input('username');
            $mail = $request->input('mail');
            $password = $request->input('password');

            $user= User::create([
                'username' => $username,
                'mail' => $mail,
                'password' => bcrypt($password),
            ]);

            //セッションを使用してユーザー名表示させる。
            $request->session()->put('username', $user->username);
            return redirect('/added');
        }
        //getリクエストの処理
           return view('auth.register');
        }

    public function added(Request $request)
    {
        $username = $request->session()->get('username');
        return view('auth.added', ['username' => $username]);
    }
}

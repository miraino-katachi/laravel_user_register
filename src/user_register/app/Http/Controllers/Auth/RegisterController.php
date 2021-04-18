<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');

        // プロパティの値を書き換えて、ユーザー登録後のリダイレクト先を変更しています。
        $this->redirectTo = route('user.index');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // バリデーションルールとエラーメッセージは、
        // UserControllerと共用したいので、Userモデルに移動しています。
        return Validator::make($data, User::$rules, User::$messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // 元はUser::create()メソッドを使って登録されていたのを、
        // fill()メソッドとsave()メソッドを使って登録しています。
        $user = new User();
        $user->fill($data);
        // パスワードはハッシュ化しないといけないので、値を上書きしています。
        $user->password = Hash::make($data['password']);
        $user->save();
        return $user;
    }
}

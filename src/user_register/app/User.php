<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     * 元の値に追加したユーザーの項目を追記ししています。
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'postal_code', 'pref_id', 'city', 'town', 'building', 'phone_number'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * バリデーションルール
     * Auth\RegisterControllerから移動しています。
     * 追加したユーザーの項目を追記しています。
     *
     * @var array
     */
    public static $rules = [
        'name' => ['required', 'string', 'max:50'],
        'email' => ['required', 'string', 'email:rfc', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        'postal_code' => ['required', 'regex:/^[0-9]{3}-[0-9]{4}$/'],
        'pref_id' => ['required'],
        'city' => ['required', 'max:50',],
        'town' => ['required', 'max:50'],
        'building' => ['max:50'],
        'phone_number' => ['required', 'regex:/^[0-9]{2,4}-[0-9]{2,4}-[0-9]{4}$/'],
    ];

    /**
     * バリデーションエラーメッセージ
     * Auth\RegisterControllerから移動しています。
     * 追加したユーザーの項目を追記しています。
     *
     * @var array
     */
    public static $messages = [
        'name.required' => 'お名前を入力してください。',
        'name.max' => 'お名前は50文字以内で入力してください。',
        'email.required' => 'E-mailアドレスを入力してください。',
        'email.email' => '正しいE-mailアドレスを入力してください。',
        'email.max' => 'E-mailアドレスは255文字以内で入力してください。',
        'email.unique' => 'そのメールアドレスは既に登録されています。',
        'password.required' => 'パスワードを入力してください。',
        'password.min' => 'パスワードは8文字以上で入力してください。',
        'password.confirmed' => '入力されたパスワードが一致しません。',
        'postal_code.required' => '郵便番号を入力してください。',
        'postal_code.regex' => '郵便番号は、半角数字3桁、半角ハイフン、半角数字4桁、の形式で入力してください。',
        'pref_id.required' => '都道府県を選択してください。',
        'city.required' => '市区町村を入力してください。',
        'city.max' => '市区町村は50文字以内で入力してください。',
        'town.required' => '町名番地等を入力してください。',
        'town.max' => '町名番地等は50文字以内で入力してください',
        'building.required' => '建物等は50文字以内で入力してください。',
        'phone_number.required' => '電話番号を入力してください。',
        'phone_number.regex' => '電話番号は、半角数字と半角ハイフンで入力してください。'
    ];

    /**
     * 都道府県リスト
     * viewで使用する都道府県のリスト
     *
     * @var array
     */
    public static $prefs = [
        1 => '北海道',
        2 => '青森県', 3 => '岩手県', 4 => '宮城県', 5 => '秋田県', 6 => '山形県', 7 => '福島県',
        8 => '茨城県', 9 => '栃木県', 10 => '群馬県', 11 => '埼玉県', 12 => '千葉県', 13 => '東京都', 14 => '神奈川県',
        15 => '新潟県', 16 => '富山県', 17 => '石川県', 18 => '福井県', 19 => '山梨県', 20 => '長野県',
        21 => '岐阜県', 22 => '静岡県', 23 => '愛知県', 24 => '三重県',
        25 => '滋賀県', 26 => '京都府', 27 => '大阪府', 28 => '兵庫県', 29 => '奈良県', 30 => '和歌山県',
        31 => '鳥取県', 32 => '島根県', 33 => '岡山県', 34 => '広島県', 35 => '山口県',
        36 => '徳島県', 37 => '香川県', 38 => '愛媛県', 39 => '高知県',
        40 => '福岡県', 41 => '佐賀県', 42 => '長崎県', 43 => '熊本県', 44 => '大分県', 45 => '宮崎県', 46 => '鹿児島県', 47 => '沖縄県',
    ];
}

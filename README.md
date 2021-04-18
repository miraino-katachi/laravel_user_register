# Laravel6でユーザー登録の項目を追加する

Laravel 6の標準のユーザー登録機能に項目を追加し、ユーザー情報の編集機能を追加しました。

## 開発時の環境

- macOS 11.2.3
- PHP 8.0.3
- Laravel 6.20.22

Windows環境でも問題なく動きます。

## 前提条件

下記の環境がインストールされていることが前提となっています。

- composer
- Node.js

下記の書籍で学習済みの方が対象となっています。

- PHPフレームワークLaravel入門 第2版（秀和システム）

## 編集、または、追加したファイル

- app/Http/Controllers/Auth/LoginController.php
  - ログイン後のリダイレクト先を変更。

- app/Http/Controllers/Auth/RegisterController.php
  - ユーザー登録後のリダイレクト先を変更
  - バリデーションルールとエラーメッセージをApp\Userモデルに移動。
  - create()アクションメソッドを、追加した項目に対応させた。

- app/Http/Controllers/UserController.php
  - ユーザー情報変更、表示のために追加。

- app/Http/Requests/UserRequest.php
  - ユーザー登録時のバリデーション用に追加。

- app/User.php
  - 追加した項目用に修正。
  - app\Http\Controllers\Auth\RegisterControllerからバリデーションルールとエラーメッセージを移動。
  - 都道府県一覧用の配列を記載。

- database/migrations/2014_10_12_000000_create_users_table.php
  - 追加したい項目を追記。

- resources/lang/ja.json
  - ログイン画面、ユーザー登録画面用の日本語翻訳ファイル。

- resources/views/auth/register.blade.php
  - 入力項目を追加。

- resources/views/layouts/app.blade.php
  - ユーザー情報修正へのリンクを追加。

- resources/views/user/edit.blade.php
  - ユーザー情報修正用のview。

- resources/views/user/index.blade.php
  - ユーザー情報表示用のview。

- routes/web.php
  - ユーザー情報表示・修正用のルートを追記。

## 日本語化について

バリデーションルールなど、英語で表示されている部分を日本語化するためのファイルをダンロードしてインストールすることができます。
```
php -r "copy('https://readouble.com/laravel/6.x/ja/install-ja-lang-files.php', 'install-ja-lang.php');"
php -f install-ja-lang.php
php -r "unlink('install-ja-lang.php');"
```
下記のファイルがダウンロードされます。
- resources/lang/ja/auth.php
- resources/lang/ja/pagination.php
- resources/lang/ja/passwords.php
- resources/lang/ja/validation.php

各ファイルを編集してカスタマイズすることができます。

詳しくは、こちらを参照してください。

https://readouble.com/laravel/6.x/ja/validation-php.html


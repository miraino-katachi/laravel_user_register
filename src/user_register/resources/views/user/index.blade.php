@extends('layouts.app')

@section('content')

<table class="table">
    <tr>
        <th class="text-right">お名前</th>
        <td>{{ Auth::user()->name }}</td>
    </tr>
    <tr>
        <th class="text-right">E-mailアドレス</th>
        <td>{{ Auth::user()->email }}</td>
    </tr>
    <tr>
        <th class="text-right">住所</th>
        <td>
            〒{{ Auth::user()->postal_code }}<br>
            {{ App\User::$prefs[Auth::user()->pref_id] }}{{ Auth::user()->city }}<br>
            {{ Auth::user()->town }}<br>
            {{ Auth::user()->building }}
        </td>
    </tr>
    <tr>
        <th class="text-right">電話番号</th>
        <td>{{ Auth::user()->phone_number }}</td>
    </tr>
</table>

@endsection
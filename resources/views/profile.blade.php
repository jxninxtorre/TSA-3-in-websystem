@extends('layout')
@section('title', 'Profile')
@section('content')
<div class="window">
    <div class="titlebar">
        <span>&#10047; My Profile</span>
        <span class="btns"><span>_</span><span>&#9633;</span><span>x</span></span>
    </div>
    <div class="content">
        <h2>Profile</h2>
        <table>
            <tr><th>Username</th><td>{{ $user->username }}</td></tr>
            <tr><th>Full Name</th><td>{{ $user->full_name }}</td></tr>
            <tr><th>Email</th><td>{{ $user->email }}</td></tr>
        </table>
    </div>
</div>
@endsection
@extends('layout.master')

@route::has('login')
{{-- This section will render when route 'login' is existed --}}
<div class="section">
    <div class="container">
        <div class="wrapper">
        @auth
            <div class="card user status">
                <div class="card title">
                    <a class="card link underline">@user[name]</a>
                </div>
                <div class="card message">
                    <a class="card info tag">@user[role]</a>
                </div>
            </div>
            <a class="button outline logout" href="@route::path('logout')">Logout</a>
        @guest
            <a class="button login" href="@route::path('login')">Log In</a>
            <a class="button clean register" href="@route::path('register')">Create an account</a>
        @endauth
        </div>
    </div>
</div>
@endroute

{{-- The contents without sections will store at 'content' section on default --}}
<div class="section">
    <div class="container">
        
    </div>
</div>

@extends('layouts.layout')

@section('css')
    <link rel="stylesheet" href="/css/loginregister.css">
    <link rel="stylesheet" href="/fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="icon" href="/img/movieicon.png">
@endsection
@section('js')
    <script src="/js/login.js"></script>
@endsection
@section('content')
    <div class="container-login">
        <div class="signup-content">
            <form method="POST" action="{{ route('login') }}" id="signin-form" class="signup-form">
                @csrf
                <h2>Sign in </h2>
                <p class="desc"><span></span></p>
                <div class="form-group">
                    @if ($errors->has('email'))
        <span style="color: red;">{{ $errors->first('email') }}</span>
    @endif
                    <input type="email" class="form-input" name="email" id="email" placeholder="Email" required autofocus/>
                </div>
                <div class="form-group">
                    <input type="text" class="form-input" name="password" id="password" placeholder="Password" required/>
                    <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                </div>
                
                <div class="form-group">
                    <input type="checkbox" name="remember" id="agree-term" class="agree-term" />
                    <label for="agree-term" class="label-agree-term"><span><span></span></span>Remember me</label> <br>
                    <a href="{{ route('password.request') }}">
                        <small class="small-text"><u>Forgot your password?</u> </small>
                    </a> 
                    <a href="{{ route('register') }}"><small class="small-text"><u>Not registered yet?</u> </small></a> 
                    
                </div>
                <div class="form-group">
                    <button type="submit"class="submit-link submit">Sign
                        In</button>
                </div>
            </form>
        </div>
    </div>
@endsection

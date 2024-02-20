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
            <form method="POST" action="{{ route('register') }}" id="signin-form" class="signup-form">
                @csrf
                @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
                <h2>Sign up </h2>
                <p class="desc"><span></span></p>
                <div class="form-group">
                    <input type="text" class="form-input" name="name" id="name" placeholder="Name"
                    :value="old('name')" required autofocus autocomplete="name"/>
                </div>
                <div class="form-group">
                  
                    <input type="email" class="form-input" name="email" id="email" placeholder="Email" required
                        autofocus />
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-input" name="password" id="password" placeholder="Password"
                    required autocomplete="new-password" />
                  
                </div>
                <div class="form-group">
                    <input id="password_confirmation"type="password" name="password_confirmation" class="form-input" placeholder="Confirm Password"
                    required autocomplete="new-password" />
                   
                </div>

                <div class="form-group">
                    <a href="{{ route('login') }}"><small class="small-text"><u>Already registered?</u> </small></a>
                </div>
                <div class="form-group">
                    <button type="submit"class="submit-link submit">Sign up</button>
                </div>
            </form>
        </div>
    </div>
@endsection

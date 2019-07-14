@extends('layouts.app')
<style>
        html,body{
            background-image: url("http://ves.ac.in/vesit/wp-content/uploads/sites/3/2015/11/IMG_93121-optimized.jpg");
            background-repeat: no-repeat;
            background-size: cover; 
            height: 100%;
            font-family: 'Numans', sans-serif;
            }
            
            .container{
            height: 100%;
            align-content: center;
            }
            
            .card{
            height: 500px;
            margin-top: 50px;
            margin-bottom: auto;
            text-align: center;
            width: 400px;
            background-color:rgba(0,0,0,0.7) !important;
            }
            
            .social_icon span{
            font-size: 60px;
            margin-left: 10px;
            color: #FFC312;
            }
            
            /* .social_icon span:hover{
            color: white;
            cursor: pointer;
            } */
            
            .card-header h3{
            margin-top: 80px;
            color: white;
            }
            
            .social_icon{
            position: absolute;
            right: 170px;
            top: 20px;
            }
            
            .input-group-prepend span{
            width: 50px;
            background-color: #FFC312;
            color: black;
            border:0 !important;
            }
            
            input:focus{
            outline: 0 0 0 0  !important;
            box-shadow: 0 0 0 0 !important;
            
            }
            
            .remember{
            color: white;
            }
            
            .remember input
            {
            width: 20px;
            height: 20px;
            margin-left: 15px;
            margin-right: 5px;
            }
            
            .login_btn{
            color: black;
            background-color: #FFC312;
            width: 100px;
            }
            
            .login_btn:hover{
            color: black;
            background-color: white;
            }
            
            .links{
            color: white;
            }
            
            .links a{
            margin-left: 4px;
            }
        </style>
@section('content')  
<div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3>Welcome Student</h3>
                    <h4 style="color: white">Sign in to Continue</h4>
                     <div class="d-flex justify-content-center social_icon">
                        {{-- <span><i class="fab fa-facebook-square"></i></span>
                        <span><i class="fab fa-google-plus-square"></i></span> --}}
                        <span><i class="fas fa-user-graduate"></i></span>
                    </div> 
                </div>
                <div class="card-body">
                    <form method="POST" action='/login'>
                        @csrf
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input id="email" type="email" placeholder="Email Id" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror 
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                           @enderror
                        </div>
                        <div class="row align-items-center remember">
                            <input type="checkbox">Remember Me
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Login" class="btn float-right login_btn">
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center links">
                        Don't have an account?<a href="/register/teacher">Sign Up</a>
                    </div>
                    <div class="d-flex justify-content-center">
                            @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

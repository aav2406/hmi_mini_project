
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
            width: 470px;
            background-color:rgba(0,0,0,0.7) !important;
            }
            
            /* .social_icon span{
            font-size: 60px;
            margin-left: 10px;
            color: #FFC312;
            } */
            
            /* .social_icon span:hover{
            color: white;
            cursor: pointer;
            } */
            
            .card-header h4,p{
            margin-top: 80px;
            color: white;
            }
            
            /* .social_icon{
            position: absolute;
            right: 150px;
            top: 20px;
            } */
            
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
            
            .register_btn{
            color: black;
            background-color: #FFC312;
            width: 150px;
            margin-left: 32%;
            }
            
            .register_btn:hover{
            color: black;
            background-color: white;
            }
            
            .links{
            color: white;
            }
            
            .links a{
            margin-left: 4px;
            }
            input[type='radio']:after {
            width: 15px;
            height: 15px;
            border-radius: 15px;
            top: 2px;
            left: -1px;
            position: relative;
            background-color: #d1d3d1;
            content: '';
            display: inline-block;
            visibility: visible;
            border: 2px solid white;
            }

    input[type='radio']:checked:after {
            width: 15px;
            height: 15px;
            border-radius: 15px;
            top: 2px;
            left: -1px;
            position: relative;
            background-color: #ffa500;
            content: '';
            display: inline-block;
            visibility: visible;
            border: 2px solid white;
         }
        </style>
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <h3 class="card-title mt-3 text-center" style="color: white">Teacher's Registration</h3>
                     
        <div class="card-body">
        <form method="POST" action='/register/teacher' >
            @csrf
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
             </div>
            <input id="name" name="name" class="form-control" placeholder="Full name" type="text" required> 
        
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div> <!-- form-group// -->
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
             </div>
            <input id="email" name="email" class="form-control" placeholder="Email address" type="email" required>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div> <!-- form-group// -->
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
            </div>
           
            <input type="text" value="     +91" style="max-width: 70px;" disabled>
            <input id="phone_no" name="phone_no" class="form-control" placeholder="Phone Number" type="text" required>
        </div> <!-- form-group// -->
        
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
            </div>
            <input id="password" class="form-control" placeholder="Create Password" type="password" name="password" required>
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div> <!-- form-group// -->
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
            </div>
            <input id="password-confirm" class="form-control" placeholder="Confirm Password" name="password_confirmation" type="password" required>
        </div> <!-- form-group// --> 
        <div class="form-group input-group">
                <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fas fa-id-badge"></i></span>
                </div>
        <input id="emp_id" type="text" placeholder="Employee ID" class="form-control" name="emp_id" required>
        </div>
        
        <div class="form-group">
            <button type="submit" class="btn register_btn"> Create Account  </button>
        </div> <!-- form-group// -->      
        <p class="text-center">Have an account? <a href="/teacher/login">Log In</a> </p>                                                                 
    </form>
        </div>
            </div>
        </div>
    </div> 
@endsection
{{-- @if ($errors->any())    
    <ul>
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    </ul>
@endif --}}
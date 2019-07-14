
<style>
        html,body{
            /* background-image: url("http://ves.ac.in/vesit/wp-content/uploads/sites/3/2015/11/IMG_93121-optimized.jpg");
            background-repeat: no-repeat;
            background-size: cover;  */
            font-family: 'Numans', sans-serif;
            }
            
            .container{
            height: 100%;
            align-content: center;
            }
            
            .card{
            height: 600px;
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
            margin-left:10px ;
            }
            .next_btn{
            color: black;
            background-color: #FFC312;
            width: 100px;
            margin-left: 37%;
            }
            .previous_btn{
            color: black;
            background-color: #FFC312;
            width: 100px;
            margin-left: 20%;
            }
            .register_btn:hover{
            color: black;
            background-color: white;
            }
            .next_btn:hover{
            color: black;
            background-color: white;
            }
            .previous_btn:hover{
            color: black;
            background-color: white;
            }
            
            .links{
            color: white;
            }
            
            .links a{
            margin-left: 4px;
            }
            .nav-tabs {
             margin-right: 15px;
             /* background-color: #FFC312; */
            }
            /* .nav-item {
                background-color: #FFC312;
            } */
           .card-header-tabs .nav-item .nav-link:active{
            font:black;
           }
           .card-header-tabs .nav-item .nav-link{
           color: #FFC312;
           }
        </style>
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <h3 class="card-title mt-3 text-center" style="color: white;margin-bottom:0px">Student's Registration</h3> 
            
           
        <div class="card-body">
                <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist" style="margin-bottom:10px">
                        <li class="nav-item">
                          <a class="nav-link active" href="#register" data-toggle="tab"  aria-controls="register" aria-selected="true">Personal Information</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link"  href="#parent" data-toggle="tab" aria-controls="parent"  aria-selected="false">Parent Information</a>
                        </li>
                </ul>
                <form method="POST" action = "{{ route('register') }}">
                        @csrf 
                <div class="tab-content mt-3">
                <div class="tab-pane active" id="register" role="tabpanel">
                
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                           <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                        </div>
                       <input id="name" name="name" class="form-control" placeholder="Full Name" type="text" required> 
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
                        <input id="email" name="email" class="form-control" placeholder="Email Address" type="email" required>
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
                        <input id="phone_no" name="phone_no" class="form-control" placeholder="Contact Number" type="text" required>
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
                        <input id="password-confirm" class="form-control" placeholder="Confirm password" name="password_confirmation" type="password" required>
                    </div> <!-- form-group// --> 
                    <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fas fa-pen"></i> </span>
                            </div>
                    <input id="roll_no" type="number" class="form-control" placeholder="Roll No" name="roll_no" min=0 max=100 required>
                    </div>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-chalkboard"></i></span>
                            <select name="division" class="custom-select">
                                    <option value="" >Select Class</option>
                                    <option value="12">D7A</option>
                                    <option value="13">D7B</option>
                                    <option value="14">D7C</option>
                                    <option value="21">D12A</option>
                                    <option value="22">D12B</option>
                                    <option value="23">D12C</option>
                                    <option value="30">D17A</option>
                                    <option value="31">D17B</option>
                                    <option value="32">D17C</option>
                                </select>   
                        </div>
                    </div> <!-- form-group end.// --> 
                   
                    <div class="form-group">
                            <a class="btn next_btn btnNext" >Next <i class="fas fa-forward" style="margin-left:5px"></i></a>
                    </div> <!-- form-group// -->      
                    
                    <p class="text-center">Have an account? <a href="/login">Log In</a> </p>                                                                 
                </div>
            
           
               
                <div class="tab-pane" id="parent" role="tabpanel" aria-labelledby="parent-tab">
             
                <h6 class="float-left" style="color:white">Parent 1</h6>
                <div class="form-group input-group">
                        <div class="input-group-prepend">
                           <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                        </div>
                       <input id="name" name="parentname1" class="form-control" placeholder="Full Name" type="text" required> 
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                </div> 
                <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                        </div>
                    
                        <input type="text" value="     +91" style="max-width: 70px;" disabled>
                        <input id="phone_no" name="parentphone_no1" class="form-control" placeholder="Contact Number" type="text" required>
                </div>
                <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                        </div>
                        <input id="email" name="parentemail1" class="form-control" placeholder="Email Address" type="email" required>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                </div>
                <h6 class="float-left" style="color:white">Parent 2 (optional)</h6>
                <div class="form-group input-group">
                        <div class="input-group-prepend">
                           <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                        </div>
                       <input id="name" name="parentname2" class="form-control" placeholder="Full Name" type="text" > 
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                </div> 
                <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                        </div>
                    
                        <input type="text" value="     +91" style="max-width: 70px;" disabled>
                        <input id="phone_no" name="parentphone_no2" class="form-control" placeholder="Contact Number" type="text" >
                </div>
                <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                        </div>
                        <input id="email" name="parentemail2" class="form-control" placeholder="Email Address" type="email" >
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                </div>
                <div class="form-group">
                        <a class="btn previous_btn btnPrevious float-left" ><i class="fas fa-backward"></i>Previous</a>
                        
                        <button type="submit" class="btn register_btn ">Create Account</button>
                        
                </div>
                </form>
                </div>
                </div>
            </div>
        </div>
            </div>
        </div>
    </div> 
    <script>
 $('.btnNext').click(function(){
  $('.card-header-tabs > .nav-item').next('li').find('a').trigger('click');
});
$('.btnPrevious').click(function(){
  $('.card-header-tabs > .nav-item').prev('li').find('a').trigger('click');
});
$('#myTab a').on('click', function (e) {
            e.preventDefault()
            $(this).tab('show')
            
          })
    </script>
    
    @endsection
{{-- @if ($errors->any())    
    <ul>
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    </ul>
@endif --}}
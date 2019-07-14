@extends('layouts.app1')
<style>    
.card{
       color: white;
        height: 370px;
        margin-top: 50px;
        margin-bottom: auto;
        width: 700px;
        background-color:rgba(0,0,0,0.7) !important;
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
            .update_btn{
            color: black;
            background-color: #FFC312;
            width: 90px;
            margin-top: 30px;
            }
            
            .update_btn:hover{
            color: black;
            background-color: white;
            }
          
        </style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
            <div class="col-md-8">
                    <div class="card" style="margin-top: 20px">
                        <div class="card-body">
                            <div class="row ">
                                <div class="col-md-12 text-md-left">
                                    <h4 >Your Profile</h4>
                                   <hr style="border:1px solid #FFC312"> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="POST" action='/home/profile/{{ $profile->id }}' >
                                        @csrf
                                        {{ method_field('patch')}}
                                        <div class="form-group row">
                                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label> 
                                        <div class="col-8">
                                                <div class="input-group-prepend">
                                                        <span class="input-group-text"> <i class="fas fa-user"></i></span>
                                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $profile->name }}" required autocomplete="name" autofocus>
                                                    </div>
                                               
                                           
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> 
                                        <div class="col-8">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                                    <input id="email" type="email" disabled class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $profile->email  }}" required autocomplete="email">
                                                </div>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                      </div>
     
                                      <div class="form-group row">
                                            <label for="phone_no" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>
                                        <div class="col-8">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                <input id="phone_no" type="text" class="form-control" name="phone_no" value="{{$profile->phone_no }}" required>
                                                </div>
                                            </div>
                                      </div>
                                      <div class="form-group row">
                                            <label for="roll_no" class="col-md-4 col-form-label text-md-right">{{ __('Roll No') }}</label> 
                                        <div class="col-8">
                                                <input id="roll_no" type="number" class="form-control" name="roll_no" value="{{$profile->roll_no }}" style="width:60px" disabled>
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <div class="offset-4 col-8">
                                                <button type="submit" class="btn float-left update_btn">
                                                        <i class="fas fa-edit"></i>   {{ __('Update') }}
                                                    </button>
                                        </div>
                                      </div>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
    </div>
</div>
@endsection
@if ($errors->any())    
    <ul>
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    </ul>
@endif
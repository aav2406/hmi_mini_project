@extends('layouts.app1')
<style>
          .card{
            /* height: 500px; */
            /* margin-top: 50px; */
            color: white;
            margin-bottom: auto;
            /* width: 400px; */
            background-color:rgba(0,0,0,0.7) !important;
            }
            .input-group-prepend span{
            width: 50px;
            background-color: pink;
            color: black;
            border:0 !important;
            }
            input:focus{
            outline: 0 0 0 0  !important;
            box-shadow: 0 0 0 0 !important;
            
            }
            .update_btn{
            color: black;
            background-color: pink;
            width: 130px;
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
            <div class="card" style="margin-top:20px">
                <div class="card-body">
                    <div class="row ">
                        <div class="col-md-12 text-md-left">
                            <h4 >Your Profile</h4>
                            <hr style="border:1px solid pink"> 
                            </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                        <div class="col-md-6">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fas fa-user"></i></span>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $profile->name }}" required autocomplete="name" autofocus disabled>
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
                            <div class="col-md-6">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    <input id="email" type="email" disabled class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $profile->email }}" required autocomplete="email">
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
                            <div class="col-md-6">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    <input id="phone_no" disabled type="text" class="form-control" name="phone_no" value="{{$profile->phone_no}}" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="div" class="col-md-4 col-form-label text-md-right">Division</label>
                            <div class="col-md-6">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    <!-- <input id="div" disabled type="text" class="form-control" name="div" value="{{$div->class}}" required> -->
                                    <input id="div" disabled type="text" class="form-control" name="div" value="D7B" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="roll_no" class="col-md-4 col-form-label text-md-right">{{ __('Roll No') }}</label>

                            <div class="col-md-6">
                                <input id="roll_no" disabled type="text" class="form-control" name="roll_no" value="{{$profile->roll_no }}" required>
                            </div>
                        </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <a href="/home/updateprofile"> <button type="submit" class="btn float-left update_btn">
                                        <i class="fas fa-edit"></i>Update Profile
                                    </button></a>
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
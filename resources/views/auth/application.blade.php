@extends('layouts.app')
@section('content')
<div class="col-12">
        <div class="card" style="margin-top: 20px">
            <div class="card-body">
                    <div class="row ">
                            <div class="col-md-12 text-md-left">
                            <h4 >Apply for {{$failed->subject_name}}</h4>
                               <hr style="border:1px solid #FFC312"> 
                               <p>NOTE : Please refer to the Instruction's Page before applying for Internal Test 3</p>
                            <form enctype="multipart/form-data" method = "POST" id = "application" action = "{{action('HomeController@storeApplication')}}">
                                @csrf
                                <textarea  required rows="4" cols="50" name="reason" placeholder = "Enter your reason here..."></textarea>
                                <br>
                                <input required type="file" name="certificate">
                                <hr style="border:1px solid #FFC312"> 
                                <input type="submit" >
                                </form>
                                <div class = "row">
                                    <div class = "col-md-4">
                                
                                </div>
                            </div>
                            </div>
                        </div>
            </div>
        </div>
@endsection
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
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
                            <h4>Marks</h4>
                            <hr style="border:1px solid #FFC312"> 
                            </div>
                    </div>
                    <form method="POST" action="{{action('TeachersController@viewMarks')}}">
                    @csrf
                    <div class="form-group row">
                        <label for="t1" class="col-md-4 col-form-label text-md-right">Enter Division</label>

                        <div class="col-md-6">
                            <select id="t1" class="form-control" name="t1">
                                @foreach($div as $d)
                                    <option value="{{$d->id}}">{{$d->class}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="t2" class="col-md-4 col-form-label text-md-right">Enter Subject</label>

                        <div class="col-md-6">
                            <select id="t2" class="form-control" name="t2">
                                @foreach($sub as $s)
                                    <option value="{{$s->id}}">{{$s->subject}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="t3" class="col-md-4 col-form-label text-md-right">Enter Semester</label>

                        <div class="col-md-6">
                            <select id="t3" class="form-control" name="t3">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>

                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-4 col-8">
                                <button type="submit" class="btn float-left update_btn">
                                        <i class="fas fa-edit"></i>   View
                                    </button>
                        </div>
                    </div>
                        
                    </form>
                    
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
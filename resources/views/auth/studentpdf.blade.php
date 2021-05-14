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
                            <h4>View Score</h4>
                            <hr style="border:1px solid pink"> 
                            </div>
                    </div>
                    <form method="POST" action="{{action('HomeController@studentpdfview')}}">
                    @csrf
                    <div class="form-group row">
                        <label for="t1" class="col-md-4 col-form-label text-md-right">Division</label>

                        <div class="col-md-6">
                            <input type="text" name="t1" disabled value="{{$div->class}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sem" class="col-md-4 col-form-label text-md-right">Select Semester</label>

                        <div class="col-md-6">
                            <select name="sem" id="sem" class="form-control">
                                <option value="">Choose:</option>
                                @if($div->class=='D7A' || $div->class=='D7B')
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                @elseif($div->class=='D12A' || $div->class=='D12B')
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                @elseif($div->class=='D17A' || $div->class=='D17B')
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                @endif
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
<style>
    table{
        color: white;
    }
    th{
        color: yellow;
    }
    .card{
       color: white;
        height: 500px;
        margin-top: 50px;
        margin-bottom: auto;
        width: 100%;
        background-color:rgba(0,0,0,0.7) !important;
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
         .sub_btn{
        color: black;
        background-color: #FFC312;
        width: 100px;
        }
        
        .sub_btn:hover{
        color: black;
        background-color: white;
        }
</style>
@extends('layouts.app')

@section('content')
<div class="col-12">
    <div class="card" style="margin-top: 20px">
        <div class="card-body">
                <div class="row ">
                        <div class="col-md-12 text-md-left">
                            <h4 >Test Three Marks</h4>
                           <hr style="border:1px solid #FFC312"> 
                        </div>
                    </div>
            <div class="table-responsive">
                <form method = "POST" action = "{{action('HomeController@store')}}">
                    @csrf
                <table id="zero_config" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Subject Name</th>
                        <th>Test 3 Marks</th>
                    </tr>
                    </thead>
                <tbody>
                    @foreach ($test as $t)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$t->subject->subject}}</td>
                            <td>
                                @if(empty($t->marks))
                                    Marks Not Updated.
                                @else
                                  {{$t->marks}}
                                @endif
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
            <button type ="submit" class ="btn sub_btn" ><i class="fas fa-backward"></i>Back</button>
        </form>
            </div>
        </div>
    </div>
@endsection
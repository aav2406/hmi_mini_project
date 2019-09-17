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
                            <h4 >Confirm Marks</h4>
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
                        <th>Test 1 Marks</th>
                        <th>Correct</th>
                        <th>Incorrect</th>
                        <th>Test 2 Marks</th>
                        <th>Average</th>
                        <th>Correct</th>
                        <th>Incorrect</th>
                    </tr>
                    </thead>
                <tbody>
                    @foreach ($test as $t)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$t->subject_name}}</td>
                            @if($t->ia1 != -2)
                                <td>{{$t->ia1}}</td>
                            @else
                                <td colspan="1"></td>
                            @endif
                            @if($t->expiry_1 == 1 && $t->ia1 != -2)
                                <td><input type="radio" name="{{$t->subject_id.'_1'}}" onclick="this.form.submit()" value =  '1' {{ $t->status1 == 1 ?'checked' :'' }} ></td>
                                <td><input type="radio" name="{{$t->subject_id.'_1'}}" onclick="this.form.submit()" value =  '0' {{ $t->status1 == 0 ? 'checked':'' }}></td>
                            @elseif($t->ia1 == -2)
                            <td colspan="2">
                            <a href = "/home/application/{{$t->subject_id}}">Apply for test 3</a>
                            </td>
                            {{-- @elseif( ) --}}
                            @else
                                <td colspan="2"></td>
                            @endif
                            @if ($t->ia2 != -1)
                                @if($t->ia2 != -2)
                                    <td>{{$t->ia2}}</td>
                                    @if($t->ia2!= -2  && $t->ia1 != -2)
                                        <td>{{$t->Avg}}</td>
                                    @else
                                        <td></td>
                                    @endif
                                @else
                                    <td colspan="2"></td>
                                @endif   
                                @if($t->expiry_2 == 1 && $t->ia2 != -2 ) 
                                    <td><input type="radio" name="{{$t->subject_id.'_2'}}" onclick="this.form.submit()" value =  '1' {{ $t->status2 == 1 ?'checked' :'' }} ></td>                     
                                    <td><input type="radio" name="{{$t->subject_id.'_2'}}" onclick="this.form.submit()" value =  '0' {{ $t->status2 == 0 ?'checked' :'' }}></td>
                                @elseif($t->ia2 == -2)
                                 <td colspan = "2"><a href = "/home/application/{{$t->subject_id}}">Apply for test 3</a></td>
                                {{-- @elseif( ) --}}
                                @else
                                    <td colspan="2"></td>
                                @endif
                            @else
                                <td colspan="4"></td>
                            @endif
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
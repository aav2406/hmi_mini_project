@extends('layouts.app')
<script>
    function disable(num)
    {
        var x = document.getElementById(':'+num).checked;
        if(x)
        {
            document.getElementById(num).value = "-2";
            document.getElementById(num).style.display = 'none';
            document.getElementById(num).required = false;
        }
        else
        {
            document.getElementById(num).value = "";
            document.getElementById(num).required = true;
            document.getElementById(num).style.display = 'inline';
        }
    }
    </script>
<style>
          .card{
            /* height: 500px; */
            /* margin-top: 50px; */
            color: white;
            margin-bottom: auto;
            /* width: 400px; */
            background-color:rgba(0,0,0,0.7) !important;
            }
            table{
                color:white;
            }
            th{
                color:pink;
            }
            .sub_btn{
            color: black;
            background-color: pink;
            width: 90px;
            margin-top: 10px;
            }
            
            .sub_btn:hover{
            color: black;
            background-color: white;
            }
</style>
@section('content')
<div class="col-12">
        <div class="card" style="margin-top:20px">
            <div class="card-body">
         <div class="row ">
                                <div class="col-md-12 text-md-left">
                                    <h4 >Update Marks for Test {{$test_no}}</h4>
                                   <hr style="border:1px solid pink"> 
                                </div>
                            </div>
                <div class="table-responsive">
                        <form method= "POST" action = "{{action('TeachersController@store')}}">
                                @csrf
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            {{-- <th>S.N.</th> --}}
                            <th style="text-align:center">Roll No</th>
                            <th style="text-align:center">Student Name</th>
                            <th style="text-align:center">Marks</th>
                            <th style="text-align:center">Absent</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($students as $student)
                            <tr>
                                {{-- <td>{{$loop -> index+1 }}</td> --}}
                                <td style="text-align:center">{{$student->roll_no }}</td>
                                <td style="text-align:center">{{$student->name }}</td>
                            <td style="text-align:center">
                            <input  id = "{{$loop->index}}" type = "number" min = '-2' max = '30' name = {{$student->id}} required></td>
                             <td style="text-align:center"><input id = ":{{$loop->index}}"type="checkbox"  onchange = "disable({{$loop->index}})"></td>
                                        
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <button type ="submit" class ="btn sub_btn" >Submit<i class="fas fa-paper-plane"></i></button>
                    </form>
                    
                </div>
            </div>
        </div>
@endsection


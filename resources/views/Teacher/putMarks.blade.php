@extends('layouts.app')
<script>
    function disable(num)
    {
        var x = document.getElementById(':'+num).checked;
        if(x)
        {
            document.getElementById(num).min = "-2";
            document.getElementById(num).value = "-2";
            document.getElementById(num).style.display = 'none';
            document.getElementById(num).required = false;
        }
        else
        {
            document.getElementById(num).min = "0";
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
                color:yellow;
            }
            .sub_btn{
            color: black;
            background-color: #FFC312;
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
                                    <h4 >Update Marks</h4>
                                   <hr style="border:1px solid #FFC312"> 
                                </div>
                            </div>
                <div class="table-responsive">
                        <form method= "POST" action = "{{action('TeachersController@store')}}">
                                @csrf
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>S.N.</th>
                            <th>Roll No</th>
                            <th>Student Name</th>
                            <th>Marks</th>
                            <th>Absent</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($students as $student)
                            <tr>
                                <td>{{$loop -> index+1 }}</td>
                                <td>{{$student->roll_no }}</td>
                                <td>{{$student->name }}</td>
                            <td><input id = "{{$loop->index}}"type = "number" min = '0' max = '20' name = {{$student->roll_no}} required></td>
                            <td><input id = ":{{$loop->index}}"type="checkbox" onchange = "disable({{$loop->index}})"></td>

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
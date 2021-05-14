@extends('layouts.app')
<script>
    function disable(num)
    {
        var x = document.getElementById(':'+num).checked;
        var y = document.getElementById('a'+num);
        y.disabled = false;
        if(x)
        {
            document.getElementById('a'+num).value = "-2";
            document.getElementById('a'+num).style.display = 'none';
            document.getElementById('a'+num).required = false;
        }
        else
        {
            y.disabled = true;
            document.getElementById('a'+num).value = "";
            document.getElementById('a'+num).required = true;
            document.getElementById('a'+num).style.display = 'inline';
        }
    }
    function edit(num)
    {

        var x = document.getElementById('b'+num);
        if(x.checked)
        {
            var y = document.getElementById('a'+num);
            y.disabled = false;

        }
        else
        {
            var y = document.getElementById('a'+num);
            y.disabled = true;
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
            width: 120px;
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
                                    <h4 >Update Marks {{$test_no}}</h4>
                                   <hr style="border:1px solid pink"> 
                                </div>
                            </div>
                <div class="table-responsive">
                        <form method= "POST" action = "{{action('TeachersController@storeMarks')}}">
                                @csrf
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Roll No</th>
                            <th>Student Name</th>
                            <th>Marks</th>
                            <th>Edit</th>
                            <th>Absent</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $student)
                            <tr>
                                <td>{{$student->roll_no }}</td>
                                <td>{{$student->name }}</td>                           
                                        @if($test_no == 1)
                                        <td><input disabled id = "a{{$loop->index}}" value = "{{$student->ia1}}" type = "number" min = '-2' max = '30' name = "{{$student->id}}" required {{ $student->ia1 == -2 ?'style=display:none;': "" }}></td>
                                        <td><input id = "b{{$loop->index}}" type="checkbox" onclick = "edit({{$loop->index}})" class = "btn btn-primary"></td>                                        
                                        <td><input id = ":{{$loop->index}}" type="checkbox" {{ $student->ia1 == -2 ? "checked" :"" }}  onchange = "disable({{$loop->index}})"></td>
                                        <td style="text-align:center">
                                            {{ 
                                                    $student->ia1 != -2 ? ($student->status1 != -1 ?($student->status1 == 0 ? 'INCORRECT': 'Correct'): 'Not yet checked'): 'ABSENT'
                                            }}
                                        </td>
                                        @elseif($test_no == 2)
                                            @if($student->ia2 == -1)
                                                <td><input  disabled id = "a{{$loop->index}}" type = "number" min = '-2' max = '30' name = {{$student->roll_no}} required></td>
                                                <td><input type="checkbox" onclick = "edit({{$loop->index}})" class = "btn btn-primary"></td>
                                                <td><input id = ":{{$loop->index}}"type="checkbox"  onchange = "disable({{$loop->index}})"></td>
                                                <td style="text-align:center">
                                                    {{ 
                                                            $student->ia2 != -2? ($student->status2 != -1 ?($student->status2 == 0 ? 'INCORRECT': 'Correct'): 'Not yet checked'): 'ABSENT'
                                                    }}
                                                </td>
                                            @else
                                                <td><input  disabled id = "a{{$loop->index}}" value = "{{$student->ia2}}" type = "number" min = '-2' max = '30' name = {{$student->id}} required {{ $student->ia2 == -2?'style=display:none;': "" }} ></td>
                                                <td><input type="checkbox" onclick = "edit({{$loop->index}})" class = "btn btn-primary"></td>
                                                <td><input id = ":{{$loop->index}}" type="checkbox" {{ $student->ia2 == -2 ? "checked" :"" }}  onchange = "disable({{$loop->index}})"></td>
                                                <td style="text-align:center">
                                                    {{ 
                                                            $student->ia2 != -2? ($student->status2 != -1 ?($student->status2 == 0 ? 'INCORRECT': 'Correct'): 'Not yet checked'): 'ABSENT'
                                                    }}
                                                </td>
                                            @endif
                                        @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                            <button type ="submit" class ="btn sub_btn" >Submit <i class="fas fa-paper-plane"></i></button>                                     
                <a type ="submit" href = "/teacher/classpdf" class ="btn sub_btn" >Show PDF <i class="fas fa-paper-plane"></i></a>
                    </form>
                    
                </div>
            </div>
        </div>
@endsection
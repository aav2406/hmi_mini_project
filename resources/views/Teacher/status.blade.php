@extends('layouts.app')
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
        <div class="card" style="margin-top:20px;">
            <div class="card-body">
                    <div class="row ">
                            <div class="col-md-12 text-md-left">
                                <h4 >Status for test {{ $test_no }}</h4>
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
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($students as $student)
                            <tr>
                                <td>{{$loop -> index+1 }}</td>
                                <td>{{$student->roll_no }}</td>
                                <td>{{$student->name }}</td>
                                <td>
                                    {{
                                     $test_no == 1 
                                    ? 
                                    (
                                            $student->ia1 != -1
                                            ?
                                                $student->ia1
                                            :
                                            ''
                                    )
                                     :
                                     (
                                        $student->ia2 != -1
                                            ?
                                                $student->ia2
                                            :
                                            ''
                                     )
                                     }}
                                </td>
                                <td>{{ 
                                (
                                $test_no == 1 
                                ? 
                                (  
                                    $student->status1 != -1 ?($student->status1 == 0 ? 'INCORRECT': 'Correct'): 'Not yet checked'
                                )
                                :
                                (
                                    $student->status2 != -1 ? ($student->status2 == 0 ? 'INCORRECT': 'Correct' ): 'Not yet checked' 
                                ) 
                                )
                            }}
                            </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                    <button type ="submit" class ="btn sub_btn " ><i class="fas fa-backward" style="margin-right:8px"></i>Back</button>
                    </form>
                    
                </div>
            </div>
        </div>
@endsection
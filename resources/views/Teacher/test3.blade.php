@extends('layouts.app')

@section('content')
<div class="col-12">
    <div class="card" style="margin-top: 20px">
        <div class="card-body">
                <div class="row ">
                        <div class="col-md-12 text-md-left">
                            <h4 >Enter Test 3 Marks</h4>
                           <hr style="border:1px solid #FFC312"> 
                        </div>
                    </div>
            <div class="table-responsive">

                <table id="zero_config" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Name</th>
                        <th>Class</th>
                        <th>Subject</th>
                        <th>Roll no</th>
                        <th>Marks</th>
                    </tr>
                    </thead>
                <tbody>
                    @foreach($students as $student)
                    <form method= "POST" action = "{{action('TeachersController@storeTestThree')}}">
                    @csrf
                    <tr>
                        <td>
                            {{$loop->index+1}}
                        </td>
                        <td>
                                {{$student->user->name}}
                        </td>
                        <td>
                            {{$student->division->class}}
                        </td>
                        <td>
                            {{$student->subject->subject}}
                        <td>
                            {{$student->user->roll_no}}
                        <td>
                            <input name = "{{$student->id}}" value = "{{$student->marks}}" type = "number" required min = 0 max = 30>
                        </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            <input type = "Submit" class = "btn btn-primary">
                    </form>
            </div>
        </div>
    </div>
@endsection
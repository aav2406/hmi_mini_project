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

                <table id="zero_config" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Name</th>
                        <th>Class</th>
                        <th>Subject</th>
                        <th>Roll no</th>
                        {{-- <th>Reason</th>
                        <th>Certificate</th> --}}
                        <th>Test Absent</th>
                        <th>Verdict</th>
                        <th>View</th>
                        {{-- <th>Remark</th> --}}
                    </tr>
                    </thead>
                <tbody>
                    @foreach($applications as $application)
                    @csrf
                    <tr>
                        <td>
                            {{$loop->index+1}}
                        </td>
                        <td>
                                {{$application->name}}
                        </td>
                        <td>
                                {{$application->class}}
                        </td>
                        <td>
                                {{$application->subject_name}}
                        </td>
                        <td>
                                {{$application->roll_no}}
                        </td>
                        <td>
                                @if($application->test_no == 1)
                                    Test 1
                                @elseif($application->test_no == 2)
                                    Test 2
                                @elseif($application->test_no == 3)
                                    Test 1 and Test 2
                                @endif
                        </td>
                        <td>
                            @if($application->status == -1)
                                Neither Accepted nor rejected
                            @elseif($application->status == 1)
                                Accepted    
                            @else 
                                Rejected
                            @endif
                        </td>
                        <td>
                            <a target="_blank" href = "/admin/applications/{{$application->id}}"  value = "Application">Check</a>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
@endsection
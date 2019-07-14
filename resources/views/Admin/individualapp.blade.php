@extends('layouts.app')
@section('content')
<div class="col-12">
        <div class="card" style="margin-top: 20px">
            <div class="card-body">
                    <div class="row ">
                            <div class="col-md-12 text-md-left">
                            <h4 >Application</h4>
                               <hr style="border:1px solid #FFC312"> 
                                <p class="text-justify"><h4>Name</h4>{{$student->name}}</p>                                                       
                                <p class="text-justify"><h4>Roll No</h4>{{$student->roll_no}}</p>                                                       
                                <p class="text-justify"><h4>Class</h4>{{$student->class}}</p>   
                                <p class="text-justify"><h4>Subject</h4>{{$student->subject_name}}</p>          
                                <h4>Certificate</h4><img style = "width:100%"src ="/storage/certificate/{{$application->certificate}}"> 
                                <p class="text-justify"><h4>Reason</h4>{{$application->reason}}</p>   
                                <br>
                                <hr style="border:1px solid #FFC312"> 

                                <div class = "row">
                                    <div class = "col-md-4">
                                    <form  method = "POST"  action = "{{action('AdminsController@storeApplication',$application->id)}}">
                                        @csrf
                                        <textarea  required rows="4" cols="50" name="remark" placeholder = "Enter remark here..."></textarea>
                                        <input type="submit" class = "btn btn-success" name="Accept" value="Accept" />
                                        <input type="submit" class = "btn btn-danger" name="Reject" value="Reject" />                                    
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
        </div>
    </div>
@endsection
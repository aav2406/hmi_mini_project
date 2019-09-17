@extends('layouts.app')

@section('content')
<div class="col-12">
    <div class="card" style="margin-top: 20px">
        <div class="card-body">
                <div class="row ">
                        <div class="col-md-12 text-md-left">
                            <h4 >Teacher's Details</h4>
                           <hr style="border:1px solid #FFC312"> 
                        </div>
                    </div>
            <div class="table-responsive">

                <table id="zero_config" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Employee ID</th>
                        <th>Delete Record</th>
                    </tr>
                    </thead>
                <tbody>
                    @foreach($teacher as $t)
                    @csrf
                        <tr>
                            <form  method = "POST"  action = "{{action('AdminsController@deleteTeacher',$t->id)}}">
                                @csrf
                                <td>
                                        {{$loop->index+1}}
                                </td>
                                <td>
                                    @if ($t->name)
                                    {{$t->name}}
                                    @else
                                        Not Registered...
                                    @endif
                                    
                                </td>
                                <td>
                                        {{$t->email}}
                                </td>
                                <td>
                                        {{$t->emp_id}}
                                </td>
                                <td>
                                    <input type = "submit" class = "btn btn-danger" value = "Delete">
                                </td>
                            </form>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        {{-- </div>
    </div> --}}

    <div class="row">
        <div class="col-md-12 text-md-left">
            <br><h4 >Add Teacher</h4>
           <hr style="border:1px solid #FFC312"> 
        </div>
    </div>
    <form  method = "POST"  action = "{{action('AdminsController@storeTeacher')}}">
        @csrf
        Email: <input type="email" name="email" /><br>
        Employee ID: <input type="number" min="0" name="emp" /><br>
        <input type="submit" class = "btn btn-success" value="Submit" />                                 
    </form>
    
    </div>
</div>
@endsection
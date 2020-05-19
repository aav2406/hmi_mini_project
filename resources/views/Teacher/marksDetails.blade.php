@extends('layouts.app1')
<style>
          .card{
            /* height: 500px; */
            /* margin-top: 50px; */
            color: white;
            margin-bottom: auto;
            /* width: 400px; */
            background-color:rgba(0,0,0,0.7) !important;
            }
            .input-group-prepend span{
            width: 50px;
            background-color: #FFC312;
            color: black;
            border:0 !important;
            }
            input:focus{
            outline: 0 0 0 0  !important;
            box-shadow: 0 0 0 0 !important;
            
            }
            .update_btn{
            color: black;
            background-color: #FFC312;
            width: 130px;
            margin-top: 30px;
            }
            
            .update_btn:hover{
            color: black;
            background-color: white;
            }
</style>
<script type="text/javascript">
    function populate(){
        document.getElementById('sub').options.length = 0;
        document.getElementById('sub').disabled = false;
        document.getElementById('t3').options.length = 0;
        document.getElementById('t3').disabled = false;
        var users = {!! json_encode($details) !!};
        var div = document.getElementById('div').value;
        var sel = document.getElementById("div");
        var text= sel.options[sel.selectedIndex].text;
        if(text=='D7A' || text=='D7B' || text=='D7C'){
                var newOption = document.createElement("option");
                newOption.value = 3;
                newOption.innerHTML = 3;
                t3.options.add(newOption);
                var newOption1 = document.createElement("option");
                newOption1.value = 4;
                newOption1.innerHTML = 4;
                t3.options.add(newOption1);
        }
        else if(text=='D12A' || text=='D12B' || text=='D12C'){
                var newOption = document.createElement("option");
                newOption.value = 5;
                newOption.innerHTML = 5;
                t3.options.add(newOption);
                var newOption1 = document.createElement("option");
                newOption1.value = 6;
                newOption1.innerHTML = 6;
                t3.options.add(newOption1);
        }
        else if(text=='D17A' || text=='D17B' || text=='D17C'){
                var newOption = document.createElement("option");
                newOption.value = 7;
                newOption.innerHTML = 7;
                t3.options.add(newOption);
                var newOption1 = document.createElement("option");
                newOption1.value = 8;
                newOption1.innerHTML = 8;
                t3.options.add(newOption1);
        }

        for(i = 0; i<users.length; i++){
            
            if(div == users[i]['division_id']){
                var newOption = document.createElement("option");
                newOption.value = users[i]['subject']['id'];
                newOption.innerHTML = users[i]['subject']['subject'];
                sub.options.add(newOption);
            }
        }
    }
</script>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="margin-top:20px">
                <div class="card-body">
                    <div class="row ">
                        <div class="col-md-12 text-md-left">
                            <h4>Marks</h4>
                            <hr style="border:1px solid #FFC312"> 
                            </div>
                    </div>
                    <form method="POST" action="{{action('TeachersController@viewMarks')}}">
                    @csrf
                    <div class="form-group row">    
                        <label class="col-md-4 col-form-label text-md-right">Select Class:</label>
                            <div class="col-md-4">  
                                <select id="div" name="division_id" onchange = "populate()" class="form-control">
                                    <option value="" class="">Choose</option>
                                   @foreach($details as $detail)
                                      <option value = "{{$detail->division_id}}" >{{$detail->division->class}}</option>
                                    @endforeach
                                </select>
                            </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Select Subject:</label>
                          <div class="col-md-4">
                             <select id = "sub" name="subject_no" class="form-control">
                             @foreach($details as $detail)
                                    <option value="{{$detail->subject->id}}">{{$detail->subject->subject}}</option>
                                @endforeach
                             </select>
                          </div>
                    </div> 
                    <div class="form-group row">
                        <label for="t3" class="col-md-4 col-form-label text-md-right"> Semester</label>

                        <div class="col-md-6">
                            <select id="t3" class="form-control" name="t3">
                                

                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-4 col-8">
                                <button type="submit" class="btn float-left update_btn">
                                        <i class="fas fa-edit"></i>   View
                                    </button>
                        </div>
                    </div>
                        
                    </form>
                    
                </div>
            </div>
       
    </div>
</div>
@endsection
@if ($errors->any())    
    <ul>
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    </ul>
@endif
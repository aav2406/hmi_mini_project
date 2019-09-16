@extends('layouts.app')
<script>
    function enable()
    {
        document.getElementById('newsimage').disabled =  false;
    }
    function disable()
    {
        document.getElementById('newsimage').disabled = true;
    }
</script>
@section('content')
<div class="col-12">
    <div class="card" style="margin-top: 20px">
        <div class="card-body">
                <div class="row ">
                        <div class="col-md-12 text-md-left">
                            <h4 >Manage News</h4>
                           <hr style="border:1px solid #FFC312"> 
                        </div>
                    </div>
            <div class="table-responsive">
                <table id="zero_config" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Content</th>
                        <th>Date Added</th>
                        <th>Date Expiry</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                <tbody>
                    @foreach( $news as $new)
                    <tr>
                    <form  method = "POST"  action = "{{action('AdminsController@deleteNews',$new->id)}}">
                    @csrf
                        <td>
                            {{$loop->index+1}}
                        </td>
                        <td>
                                {{$new->Notification}}
                        </td>
                        <td>
                              {{$new->created_at}}
                        </td>
                        <td>
                              {{$new->expiry}}
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
            <div class="row">
                        <div class="col-md-12 text-md-left">
                            <h4 >Add News</h4>
                           <hr style="border:1px solid #FFC312"> 
                        </div>
                    </div>
                    <form  enctype="multipart/form-data" method = "POST" action = "{{action('AdminsController@storeNews')}}">
                    @csrf
                    <hr>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" id="content" name = "content" placeholder="Enter Content"></textarea>
            </div>
            <div class="form-group">
                <label for="image_verifier">Upload Image?</label>
                <div class="input-group-prepend">
                                    Yes<input onchange = "enable()" type="radio" name="gender" style="margin-right:5px;" value="" onchange = "enable1()"><font color="white">One</font> <br>
                                    No<input onchange = "disable()" type="radio" name="gender" style="margin-right:5px;margin-left:15px" value="" onchange = "enable2()"><font color="white">Two</font>
                </div>
            </div>
            <div class="form-group" >
                <label for="news_image">Image</label>
                <input disabled required type="file" name = "news_image" class="form-control" id="newsimage" >
            </div>
            <div class="form-group" >
                <label for="days">Days After Expire</label>
                <input min = "1" type="number" name = "days" class="form-control" id="days" >
            </div>
            <input type="submit" class="btn btn-primary" value = "Submit"></button>
            </form>
            </div>
        </div>
    </div>
@endsection


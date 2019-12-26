@extends('layouts.app')

<style>
body{
   background:linear-gradient(rgba(16,29,44,.85),rgba(16,29,44,.85)),url("http://ves.ac.in/vesit/wp-content/uploads/sites/3/2015/11/IMG_93121-optimized.jpg") center no-repeat;
   background-size: cover; 
   font-size: 0.9rem;
   padding: 0px;
}
.holder { 
  background-color:#ccc;
  width:300px;
  height:250px;
  overflow:hidden;
  padding:10px;
  font-family:Helvetica;
}
.holder .mask {
  position: relative;
  left: 0px;
  top: 10px;
  width:300px;
  height:240px;
  overflow: hidden;
}
.holder ul {
  list-style:none;
  margin:0;
  padding:0;
  position: relative;
}
.holder ul li {
  padding:10px 0px;
}
.holder ul li a {
  color:darkred;
  text-decoration:none;
}
</style>
@section('content')
<div class="text-center" style="font-size:3em;margin-top:20%;color:yellow">
   <b>{{$title}}</b>
</div>

   
@endsection



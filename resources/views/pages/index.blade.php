@extends('layouts.app')
<title>VESIT</title>
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

@import url('https://fonts.googleapis.com/css?family=Montserrat');

.onoffswitch3
{
    position: relative; 
    -webkit-user-select:none; -moz-user-select:none; -ms-user-select: none;
}

.onoffswitch3-checkbox {
    display: none;
}

.onoffswitch3-label {
    display: block; overflow: hidden; cursor: pointer;
    border: 0px solid #999999; border-radius: 0px;
}

.onoffswitch3-inner {
    display: block; width: 200%; margin-left: -100%;
    -moz-transition: margin 0.3s ease-in 0s; -webkit-transition: margin 0.3s ease-in 0s;
    -o-transition: margin 0.3s ease-in 0s; transition: margin 0.3s ease-in 0s;
}

.onoffswitch3-inner > span {
    display: block; float: left; position: relative; width: 50%; height: 30px; padding: 0; line-height: 30px;
    font-size: 14px; color: white; font-family: 'Montserrat', sans-serif; font-weight: bold;
    -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box;
}

.onoffswitch3-inner .onoffswitch3-active {
    padding-left: 10px;
    background-color: #EEEEEE; color: #FFFFFF;
}

.onoffswitch3-inner .onoffswitch3-inactive {
    width: 110px;
    padding-left: 20px;
    background-color: #f7ca00; color: black;
    text-align: right;
}

.onoffswitch3-switch {
    display: block; width: 50%; margin: 0px; text-align: center; 
    border: 0px solid #999999;border-radius: 0px; 
    position: absolute; top: 0; bottom: 0;
}
.onoffswitch3-active .onoffswitch3-switch {
    background: #f7ca00; left: 0;
    width: 160px;
}
.onoffswitch3-inactive{
    background: #f7ca00; right: 0;
    width: 110px;
}
.onoffswitch3-checkbox:checked + .onoffswitch3-label .onoffswitch3-inner {
    margin-left: 0;
}

.glyphicon-remove{
    padding: 3px 0px 0px 0px;
    color: #fff;
    background-color: #000;
    height: 25px;
    width: 25px;
    border-radius: 15px;
    border: 2px solid #fff;
}

.scroll-text{
    color: #000;
}
</style>
@section('content')
<div class="text-center" style="font-size:3em;margin-top:20%;color:yellow">
   <b>{{$title}}</b>
</div>

<div class="onoffswitch3">
  <input type="checkbox" name="onoffswitch3" class="onoffswitch3-checkbox" id="myonoffswitch3" checked>
  <label class="onoffswitch3-label" for="myonoffswitch3">
      <span class="onoffswitch3-inner">
          <span class="onoffswitch3-active">
              <marquee class="scroll-text"> 
                @foreach($news as $new) 
                    @if($new->news_image=="")
                    <i class="fas fa-forward"></i>{{$new->news}}
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    @else
                    <i class="fas fa-forward"></i><a href="{{ URL::asset("/storage/news/".$new->news_image) }}" style="color:#f7ca00">{{$new->news}}</a>&nbsp;
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    @endif
                @endforeach
              </marquee>
              <span class="onoffswitch3-switch" style="color:black">IMPORTANT NOTICES <i class="fas fa-times"></i></span>
          </span>
          <span class="onoffswitch3-inactive"><span class="onoffswitch3-switch" style="color:#000 ">SHOW <i class="fas fa-forward"></i></span></span>
      </span>
  </label>
</div>

@endsection



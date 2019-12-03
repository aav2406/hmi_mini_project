@extends('layouts.app')

<style>
body{
   background-image: url("http://ves.ac.in/vesit/wp-content/uploads/sites/3/2015/11/IMG_93121-optimized.jpg");
   background-repeat: no-repeat;
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
<div class="holder">
   <ul id="ticker01">
      @foreach($news as $news1)
         <li><a href="{{$news1->news_image}}">{{$news1->Notification}}</a></li> 
      @endforeach  
   </ul>
 </div>
 <script type="text/javascript">
   jQuery.fn.liScroll = function(settings) {
      settings = jQuery.extend({
         travelocity: 0.03
         }, settings);		
         return this.each(function(){
               var $strip = jQuery(this);
               $strip.addClass("newsticker")
               var stripHeight = 1;
               $strip.find("li").each(function(i){
                  stripHeight += jQuery(this, i).outerHeight(true); // thanks to Michael Haszprunar and Fabien Volpi
               });
               var $mask = $strip.wrap("<div class='mask'></div>");
               var $tickercontainer = $strip.parent().wrap("<div class='tickercontainer'></div>");								
               var containerHeight = $strip.parent().parent().height();	//a.k.a. 'mask' width 	
               $strip.height(stripHeight);			
               var totalTravel = stripHeight;
               var defTiming = totalTravel/settings.travelocity;	// thanks to Scott Waye		
               function scrollnews(spazio, tempo){
               $strip.animate({top: '-='+ spazio}, tempo, "linear", function(){$strip.css("top", containerHeight); scrollnews(totalTravel, defTiming);});
               }
               scrollnews(totalTravel, defTiming);				
               $strip.hover(function(){
                 jQuery(this).stop();
               },
               function(){
                 var offset = jQuery(this).offset();
                 var residualSpace = offset.top + stripHeight;
                 var residualTime = residualSpace/settings.travelocity;
                 scrollnews(residualSpace, residualTime);
               });			
         });	
   };
   
   $(function(){
       $("ul#ticker01").liScroll();
   });
   
   </script>
   
@endsection



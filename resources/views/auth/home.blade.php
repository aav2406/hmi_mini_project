
@extends('layouts.app1')
<style>
       .card{
            color: white;
            height: 140px;
            margin-top: 50px;
            /* margin-left: 60px; */
            margin-bottom: auto;
            width: 300px;
            background-color:rgba(0,0,0,0.7) !important;
            }
        .card-footer{
            background-color:rgba(0,0,255,0.6) !important;
        }
        .card-footer:hover{
            color:pink;
        }
        .card:hover{
            color:blue;
        }
        .social_icon span{
            font-size: 60px;
            margin-right: 10px;
            color: pink;
            }
        .social_icon{
            position: absolute;
            right: 200px;
            top: 20px;
        }
</style>
@section('content')
<div class="container" style="margin-right:20px;margin-top:20px"> 
    <div class="row">
        <div class="col-lg-12">
            
            <h1 style="color:blue"><i class="fas fa-tachometer-alt" style="color: blue;"></i> <strong>Student's Dashboard</strong></h1>
            
            <hr  style="border: solid pink">
        </div>
    </div>
    
    <div class="row">
            <a href="/home/profile">
                <div class="col-lg-3 col-md-6">
                    <div class="card ">
                        <div class="card-body">
                                 <div class="card-title text-right">
                                    <div class="social_icon">
                                        <span><i class="fas fa-user"></i></span>
                                    </div>
                                    <h4>Edit Profile</h4>
                                </div>
                        </div>
                        <div class="card-footer">
                            <span class="float-left"  style="color:pink">View</span>
                            <span class="float-right"  style="color:pink"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="/home/studentMarkspdf">
                <div class="col-lg-3 col-md-6">
                    <div class="card ">
                        <div class="card-body">
                                 <div class="card-title text-right">
                                    <div class="social_icon">
                                        <span><i class="fas fa-eye"></i></span>
                                    </div>
                                    <h4>View Score</h4>
                                </div>
                        </div>
                        <div class="card-footer">
                            <span class="float-left" style="color:pink">View</span>
                            <span class="float-right"  style="color:pink"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </a>
                
            <a href="/home/marks">
                <div class="col-lg-3 col-md-6">
                    <div class="card ">
                        <div class="card-body">
                                 <div class="card-title text-right">
                                    <div class="social_icon">
                                    <span><i class="far fa-check-circle"></i></span>
                                    </div>
                                    <h4>Check Score</h4>
                                </div>
                        </div>
                        <div class="card-footer">
                            <span class="float-left" style="color:pink">View</span>
                            <span class="float-right"  style="color:pink"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </a>
            <!-- @if($status)
            <a href="/home/marks">
                <div class="col-lg-3 col-md-6">
                    <div class="card ">
                        <div class="card-body">
                                 <div class="card-title text-right">
                                    <div class="social_icon">
                                    <span><i class="far fa-check-circle"></i></span>
                                    </div>
                                    <h4>Test 3 Marks</h4>
                                </div>
                        </div>
                        <div class="card-footer">
                            <span class="float-left">View</span>
                            <span class="float-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </a>
            @endif
    
            <a href="#">
                <div class="col-lg-3 col-md-6">
                    <div class="card ">
                        <div class="card-body">
                                 <div class="card-title text-right">
                                    <div class="social_icon">
                                        <span><i class="fas fa-question-circle"></i></span>
                                    </div>
                                    <h4>Having Questions</h4>
                                </div>
                        </div>
                        <div class="card-footer">
                            <span class="float-left">Contact Us</span>
                            <span class="float-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </a> -->
</div>
    </div>
@endsection
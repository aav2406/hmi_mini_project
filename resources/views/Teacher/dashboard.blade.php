
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
            color:yellow;
        }
        .card:hover{
            color:blue;
        }
        .social_icon span{
            font-size: 60px;
            margin-right: 10px;
            color: #FFC312;
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
            
            <h1 style="color:blue"><i class="fas fa-tachometer-alt" style="color: blue;"></i> <strong>Teacher's Dashboard</strong></h1>
            
            <hr  style="border: solid #FFC312">
        </div>
    </div>
    
    <div class="row">
            <a href="/teacher/profile">
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
                            <span class="float-left">View</span>
                            <span class="float-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </a>
                
            <a href="/teacher/putmarks">
                <div class="col-lg-3 col-md-6">
                    <div class="card ">
                        <div class="card-body">
                                 <div class="card-title text-right">
                                    <div class="social_icon">
                                    <span><i class="far fa-arrow-alt-circle-right"></i></span>
                                    </div>
                                    <h4>Enter Marks</h4>
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

            <a href="/teacher/checkstatus">
                <div class="col-lg-3 col-md-6">
                    <div class="card ">
                        <div class="card-body">
                                 <div class="card-title text-right">
                                    <div class="social_icon">
                                     <span><i class="fas fa-search"></i></span>
                                    </div>
                                    <h4>Check Status</h4>
                                </div>
                        </div>
                        <div class="card-footer">
                            <span class="float-left">Check</span>
                            <span class="float-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="/teacher/test3">
                <div class="col-lg-3 col-md-6">
                    <div class="card ">
                        <div class="card-body">
                                 <div class="card-title text-right">
                                    <div class="social_icon">
                                        <span><i class="far fa-arrow-alt-circle-right"></i></span>
                                    </div>
                                    <h4>Enter Test-3 Marks</h4>
                                </div>
                        </div>
                        <div class="card-footer">
                            <span class="float-left">Enter</span>
                            <span class="float-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="/teacher/editmarks">
                <div class="col-lg-3 col-md-6">
                    <div class="card ">
                        <div class="card-body">
                                 <div class="card-title text-right">
                                    <div class="social_icon">
                                        <span><i class="fas fa-edit"></i></span>
                                    </div>
                                    <h4>Edit Marks</h4>
                                </div>
                        </div>
                        <div class="card-footer">
                            <span class="float-left">Edit</span>
                            <span class="float-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="#">
                <div class="col-lg-3 col-md-6">
                    <div class="card ">
                        <div class="card-body">
                                 <div class="card-title text-right">
                                    <div class="social_icon">
                                     <span><i class="fas fa-user-cog"></i></span>
                                    </div>
                                    <h4>Settings</h4>
                                </div>
                        </div>
                        <div class="card-footer">
                            <span class="float-left">Go to Settings</span>
                            <span class="float-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </a>
    
           
</div>
    </div>
@endsection
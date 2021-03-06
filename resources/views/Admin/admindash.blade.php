
@extends('layouts.app1')
<style>
       .card{
            color: white;
            height: 140px;
            margin-top: 50px;
            /* margin-left: 60px; */
            margin-bottom: auto;
            width: 350px;
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
            right: 250px;
            top: 20px;
        }
</style>
@section('content')
<div class="container" style="margin-right:20px;margin-top:20px"> 
    <div class="row">
        <div class="col-lg-12">
            
            <h1 style="color:blue"><i class="fas fa-tachometer-alt" style="color: blue;"></i> <strong>Admin's Dashboard</strong></h1>
            
            <hr  style="border: solid #FFC312">
        </div>
    </div>
    
    <div class="row">
            <a href="/admin/applications">
                <div class="col-lg-3 col-md-6">
                    <div class="card ">
                        <div class="card-body">
                                 <div class="card-title text-right">
                                    <div class="social_icon">
                                        <span><i class="fas fa-eye"></i></span>
                                    </div>
                                    <h4>Applications for Test 3</h4>
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
    <a href="/admin/classReport">
        <div class="col-lg-3 col-md-6">
            <div class="card ">
                <div class="card-body">
                         <div class="card-title text-right">
                            <div class="social_icon">
                                <span><i class="fas fa-eye"></i></span>
                            </div>
                            <h4>Class Report</h4>
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

    <a href="/admin/replace">
        <div class="col-lg-3 col-md-6">
            <div class="card ">
                <div class="card-body">
                         <div class="card-title text-right">
                            <div class="social_icon">
                                <span><i class="fas fa-user"></i></span>
                            </div>
                            <h4>Replace Teacher</h4>
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
    <a href="/admin/managenews">
        <div class="col-lg-3 col-md-6">
            <div class="card ">
                <div class="card-body">
                         <div class="card-title text-right">
                            <div class="social_icon">
                                <span><i class="fas fa-user"></i></span>
                            </div>
                            <h4>Manage News</h4>
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

   

    </div>
@endsection
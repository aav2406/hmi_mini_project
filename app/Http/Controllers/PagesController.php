<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title='Internal Assessment Record System';
        return view('pages.index',compact('title'));
    }
    public function index1(){
        return view('pages.index1');
    }
}

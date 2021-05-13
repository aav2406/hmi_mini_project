<?php

namespace App\Http\Controllers;
use App\News;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title='Internal Assessment Record System';
        $news=News::get();
        return view('pages.index',compact('title'))->with('news',$news);
    }

    public function index1(){
        return view('pages.index1');
    }
}

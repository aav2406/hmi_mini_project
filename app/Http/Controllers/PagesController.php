<?php

namespace App\Http\Controllers;
use App\News;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title='Internal Assessment Record System';
        $news = News::where('updated_at', '>=', now()->toDateTimeString())->orderBy('created_at', 'desc')->get();
        $length = $news->count();
        for( $i = 0 ; $i < $length ; $i++)
        {
                if(!isset($news[$i]['news_image']))
                {
                    $news[$i]['news_image'] = '#'; 
                }

        }
        return view('pages.index',compact('title','news'));
    }

    public function index1(){
        return view('pages.index1');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;

class blogController extends Controller
{
    //
    public function home(){
        $posts= Post::orderBy('created_at','desc')->limit(5)->get();

    	return view('pages.home')->withPosts($posts);
    }

     public function about(){

    	return view('pages.about');
    }
     public function contact(){

    	return view('pages.contact');
    }

}

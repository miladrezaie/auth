<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Gate;

class PanelController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        return view('welcome', compact('posts'));
    }

    public function single(Post $post)
    {

//        authorization services by ACL Gate
//        auth()->loginUsingId(1);
//        if (Gate::allows('show-post',$post)){
//            return $post;
//        }
//        abort(403,'not access');

//        authorization services by ACL PostPolicy
        auth()->loginUsingId(1);
        if (Gate::allows('view',$post)){
            return $post;
        }
        abort(403,'not access');
    }
}

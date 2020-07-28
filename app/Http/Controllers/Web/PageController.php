<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Post;
use App\Category;

class PageController extends Controller
{
    public function blog(){
        $categories =   Category::orderBy('id', 'DESC')->paginate();;
        $posts =        Post::orderBy('id', 'DESC')->where('status', 'PUBLISHED')->paginate(3);

        return view('web.posts', compact('posts', 'categories'));
    }

    public function category($slug){

        $categories     = Category::orderBy('id', 'DESC')->paginate();
        $category       = Category::where('slug', $slug)->pluck('id')->first();
        $posts          = Post::where('category_id', $category)
                        ->orderBy('id', 'DESC')->where('status', 'PUBLISHED')->paginate(3);

        return view('web.posts', compact('posts', 'categories'));
    }

    public function tag($slug){
        $categories =   Category::orderBy('name', 'DESC')->paginate();
        $posts = Post::whereHas('tags', function($query) use($slug){
            $query->where('slug', $slug);
        })
        ->orderBy('id', 'DESC')->where('status', 'PUBLISHED')->paginate(3);

        return view('web.posts', compact('posts', 'categories'));
    }

    public function post($slug){
        $categories =   Category::orderBy('name', 'DESC')->paginate();
        $post = Post::where('slug', $slug)->first();

        return view('web.post', compact('post', 'categories'));
    }
}

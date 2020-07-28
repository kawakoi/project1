<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Mail; //Importante incluir la clase Mail, que será la encargada del envío
use App\Category;
use App\Post;

class EmailController extends Controller
{
  
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'DESC')->paginate();
        $post     = Post::orderBy('id', 'DESC')->paginate();
        
        return view('contact.index', compact('categories', 'post'));
    }

    public function category($slug){

        $categories     = Category::orderBy('id', 'DESC')->paginate();
        $category       = Category::where('slug', $slug)->pluck('id')->first();
        $posts          = Post::where('category_id', $category)
                        ->orderBy('id', 'DESC')->where('status', 'PUBLISHED')->paginate(3);

        return view('web.posts', compact('posts', 'categories'));
    }

    public function post($slug){
        $post = Post::where('slug', $slug)->first();

        return view('web.post', compact('post'));
    }

    public function contact(Request $request){
        $subject = "Formulario de contacto";
        $for = "terrorgore14@gmail.com";
        
        Mail::send('contact.email',$request->all(), function($msj) use($subject,$for){
            $msj->from("emaildelproject1@gmail.com","Riddick");
            $msj->subject($subject);
            $msj->to($for);
        });

        return redirect()->back();
    }
}
<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Post;
use App\Category;
use App\Mail;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('EsEstandar');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$categories  = Category::orderBy('id', 'ASC')->paginate();
        $post     = Post::orderBy('id', 'DESC')->paginate();
  
        return view('contact.index', compact('post'));
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

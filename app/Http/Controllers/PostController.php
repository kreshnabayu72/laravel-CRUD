<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Throwable;
use PhpParser\Node\Stmt\TryCatch;

class PostController extends Controller
{
    //
    public function show_index(){
        return view('index',['post'=>Post::all()]);
    }

    public function show_write(){
        return view('write');
    }

    public function show_edit_post(Post $post){
        return view('edit_post',[
            'post'=>$post,
        ]);
    }

    public function add_post(Request $request){
        $formFields = $request->only('title','content','image','_token');
        if($request->hasFile('image')){
            $formFields['image'] = $request->file('image')->store('images','public');
        }
        
        $formFields['author'] = Auth::user()->username;
        try {
            Post::create($formFields);
            return redirect('/')->with('message','success');
        }catch (Throwable $e) {
            return back()->with('message',"error?");
        }
    }
    public function single_post(Post $post){
        return view('show',["post"=>$post]);
    }

    public function edit_post(Request $request,Post $post){
        $formFields = $request->only('title','content','image','_token');
        if($request->hasFile('image')){
            $formFields['image'] = $request->file('image')->store('images','public');
        }
        
        $formFields['author'] = $post['author'];
        try {
            $post->update($formFields);
            return redirect('/')->with('message','success edited post');
        }catch (Throwable $e) {
            return back()->with('message',"error?");
        }
    }

    public function delete_post(Post $post){
        $post->delete();
        return back()->with("message","deleted post");
    }
}

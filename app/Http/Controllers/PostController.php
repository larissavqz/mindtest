<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Input;
use App\Post;
use Redirect;
use File;

class PostController extends Controller
{
	public function index(){
		$post = DB::table('post')->orderBy('created_at', 'desc')->get();
		return view('home')->with('post', $post);
	}

    public function view($post_id){
        $post = Post::find($post_id);
        return view('post.view-post')->with('post', $post);
    }

    public function create(){
    	if (Input::file('post-image')){
    		$image = Input::file('post-image');
    		$extension = $image->getClientOriginalExtension();

    		if ($extension != 'png' && $extension != 'jpg'){
    			return back()->with('error', 'Erro: Não é uma imagem válida!');
    		}
    	}
    	$post = new Post();
    	$post->post_title = Input::get('post-title');
    	$post->post_body  = Input::get('post-body');
    	$post->post_image = "";
    	$post->save();
    	if (Input::file('post-image')){
    		File::move($image, public_path().'/post-image/'.$post->post_id.'.'.$extension);
    		$post->post_image = '/post-image/'.$post->post_id.'.'.$extension;
    		$post->save();
    	}
    	return redirect('/');

    }

    public function edit($post_id){
    	$post = Post::find($post_id);
    	return view('post.edit-post')->with('post', $post);
    }

    public function update(Request $request, $post_id){
    	$post = Post::find($post_id);

    	if (Input::file('post-image')){
    		$image = Input::file('post-image');
    		$extension = $image->getClientOriginalExtension();

    		if ($extension != 'png' && $extension != 'jpg'){
    			return back()->with('error', 'Erro: Não é uma imagem válida!');
    		}
    	}

    	if($post->post_title != Input::get('post-title')){
    		$post->post_title = Input::get('post-title');
    	}
    	if($post->post_body != Input::get('post-body')){
    		$post->post_body = Input::get('post-body');
    	}

    	if (Input::file('post-image')){
    		File::delete(public_path().'$post->post_image');
    		File::move($image, public_path().'/post-image/'.$post->post_id.'.'.$extension);
    		$post->post_image = '/post-image/'.$post->post_id.'.'.$extension;
    		$post->save();
    	}
    	return redirect('/');
    }

    public function destroy($post_id){
    	$post = Post::find($post_id);
    	File::delete(public_path().'$post->post_image');
    	$post->delete();
    	return redirect('/');
    }
}

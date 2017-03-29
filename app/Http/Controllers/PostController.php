<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

use Carbon\Carbon;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest();
        
        if($month = request('month'))
        {            
            $posts->whereMonth('created_at', Carbon::parse($month)->month);
        }
        
        if($year = request('year'))
        {
            $posts->whereYear('created_at', $year);
        }
        
        $posts = $posts->paginate(5);

        
        //$archives = Post::archives();
        
        return view('post.index',compact('posts','archives'));
    }
    
    public function create(Request $request)
    {
        return view('post.create');
    }
    
    public function store(Post $post)
    {
        $this->validate(request(),[
            'title' => 'required',
            'body'  => 'required',
            ]);
        
        $post->addPost();
        
        return redirect('/post');
    }
    
    public function show(Post $post)
    {
        return view('post.show',compact('post'));
    
    }
    
    
}

<?php
   
namespace App\Http\Controllers;
   
use App\Models\Post;
use App\Models\Comment;
use Facades\App\Repository\Posts;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
   
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
    
        return view('posts.index', compact('posts'));
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$request->validate([
            'title'=>'required',
            'body'=>'required',
        ]);
    
        Post::create($request->all());
    
        return redirect()->route('posts.index');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$post = Post::find($id);
        return view('posts.show', compact('post'));
    }

    public function getlike(Request $request)
    {
        $post = Post::find($request->post);
        return response()->json([
            'post'=>$post,
        ]);
    }
    public function like(Request $request)
    {
        $post = Post::find($request->post);
        $value = $post->like;
        $post->like = $value+1;
        $post->save();
        return response()->json([
            'message'=>'Thanks',
        ]);
    }    
    public function getDislike(Request $request)
    {
        $post = Post::find($request->post);
        return response()->json([
            'post'=>$post,
        ]);
    }
    public function dislike(Request $request)
    {
        $post = Post::find($request->post);
        $value = $post->dislike;
        $post->dislike = $value+1;
        $post->save();
        return response()->json([
            'message'=>'Thanks',
        ]);
    }

}
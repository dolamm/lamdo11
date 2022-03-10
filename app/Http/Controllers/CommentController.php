<?php
   
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use App\Models\Comment;
   
class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$request->validate([
            'body'=>'required',
        ]);
   
        $input = $request->all();
        $input['user_id'] = auth()->user()->id;
    
        Comment::create($input);
   
        return back();
    }
    public function Commentgetlike(Request $request)
    {
        $comment = Comment::find($request->comment);
        return response()->json([
            'comment'=>$comment,
        ]);
    }
    public function Commentlike(Request $request)
    {
        $comment = Comment::find($request->comment);
        $value = $comment->like;
        $comment->like = $value+1;
        $comment->save();
        return response()->json([
            'message'=>'Thanks',
        ]);
    }    
    public function CommentgetDislike(Request $request)
    {
        $comment = Comment::find($request->comment);
        return response()->json([
            'comment'=>$comment,
        ]);
    }
    public function Commentdislike(Request $request)
    {
        $comment = Comment::find($request->comment);
        $value = $comment->dislike;
        $comment->dislike = $value+1;
        $comment->save();
        return response()->json([
            'message'=>'Thanks',
        ]);
    }
}
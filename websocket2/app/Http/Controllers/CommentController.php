<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\User;
use App\Post;
use App\Http\Requests\CommentStoreRequest;
use Auth;
use Log;
use App\Events\NewComment;

class CommentController extends Controller
{
    public function index(Post $post)
    {
    	$comments = $post->comments()->with('user')->latest()->get();
        
    	return response()->json($comments);
    }

    public function store(Post $post,CommentStoreRequest $request)
    {
    	$request = $request->validated();
    	$request['user_id'] = Auth::id();

    	$comment = $post->comments()->create($request);
        Log::info($comment->id);
    	$comment = Comment::where('id',$comment->id)->with('user')->first();
        Log::info($comment);

        broadcast(new NewComment($comment))->toOthers();
        
    	return $comment->toJson();
    }
}

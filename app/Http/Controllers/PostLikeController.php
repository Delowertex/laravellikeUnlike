<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostLikeController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }

    public function store(Post $post, Request $request){
        // dd($post->likedBy($request->user()));
        if($post->likedBy($request->user())){
            return response(null, 200);
        }
        $post->likes()->create([
            'user_id' => $request->user()->id,
        ]);

        return back();
    }
}

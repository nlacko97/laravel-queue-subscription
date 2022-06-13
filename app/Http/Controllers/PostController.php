<?php

namespace App\Http\Controllers;

use App\Events\PostCreated;
use App\Http\Requests\CreatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        $validatedData = $request->validated();
        $post = new Post($validatedData);
        $post->save();
        PostCreated::dispatch($post);
        return response()->json([
            'code' => 200,
            'message' => 'Post created!'
        ]);
    }
}

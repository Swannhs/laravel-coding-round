<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(): JsonResponse
    {
        $posts = Post::all();
        return response()->json($posts);
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
        ]);

        $post = Post::create($request->only(['title', 'content']));
        return response()->json($post, 201);
    }

    public function show(string $id): JsonResponse
    {
        $post = Post::findOrFail($id);
        return response()->json($post);
    }
}

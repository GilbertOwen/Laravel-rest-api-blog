<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['category', 'user'])->get();

        // if (count($posts) == 0) {
        //     return response([
        //         'message' => 'No post has been created yet'
        //     ]);
        // }
        return response([
            'message' => 'Successfully retrieved posts',
            "posts" => $posts
        ]);
    }
    public function show($id)
    {
        $post = Post::where('id', $id)->with('category', 'user')->first();

        if (!$post) {
            return response([
                "message" => "No post has been found"
            ]);
        }

        return response([
            'message' => 'Successfully retrieved post',
            "post" => $post
        ]);
    }
    public function store(Request $request)
    {
        $vd = Validator::make($request->all(), [
            "user_id" => "required",
            "category_id" => "required",
            "title" => "required|min:5",
            "slug" => "required|unique:posts,slug",
            "description" => "required|min:10"
        ]);

        if ($vd->fails()) {
            return response([
                "message" => "Invalid fields",
                "errors" => $vd->errors()
            ], 422);
        }

        $data = $vd->validated();

        $post = Post::create($data);

        return response([
            "message" => "Successfully created post",
            "id" => $post->id
        ], 200);
    }

    public function createSlug(Request $request)
    {
        $slug = Post::where("slug", $request->get('words'))->exists();

        if (!$slug) {
            return response([
                "valid" => true
            ]);
        }
        return response([
            'valid' => false
        ]);
    }
}

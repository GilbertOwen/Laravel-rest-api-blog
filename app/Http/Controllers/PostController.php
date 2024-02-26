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
            // "user_id" => "required",
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

        $data['user_id'] = random_int(1, 3);

        $post = Post::create($data);

        return response([
            "message" => "Successfully created post",
            "id" => $post->id
        ], 200);
    }
    public function destroy($id)
    {
        if (Post::where('id', $id)->exists()) {
            Post::destroy($id);
            return response([
                "message" => "Successfully deleted post"
            ], 200);
        }
        return response([
            "message" => "Can't find the related post"
        ], 422);
    }

    public function createSlug(Request $request)
    {
        $words = $request->get('words');
        $slug = $words; // Assume initially that the given words can be used as the slug.

        if (Post::where("slug", $slug)->exists()) {
            // The given slug exists, so we need to generate a unique slug.
            do {
                $slug = uniqid(); // Generate a unique ID for the slug.
            } while (Post::where('slug', $slug)->exists()); // Ensure the generated slug is unique.

            return response([
                'valid' => false, // Indicate the original slug was not valid (because it already exists).
                "slug" => $slug // Return the newly generated unique slug.
            ]);
        } else {
            // The given slug does not exist, so it's valid and no new slug needs to be generated.
            return response([
                "valid" => true // Indicate the original slug is valid (because it does not exist).
            ]);
        }
    }
}

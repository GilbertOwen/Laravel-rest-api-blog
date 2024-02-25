<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();

        if(count($categories) == 0){
            return response([
                "message" => "No categories were found or haven't been made yet."
            ]);
        }
        return response([
            "message" => "Successfully retrieved all categories",
            "categories" => $categories
        ]);
    }
}

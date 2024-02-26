<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index(){
        $authors = User::all();

        if(count($authors) == 0){
            return response([
                "message" => "No author yet."
            ]);
        }
        return response([
            "message" => "Retrieved authors.",
            "authors" => $authors
        ]);
    }
}

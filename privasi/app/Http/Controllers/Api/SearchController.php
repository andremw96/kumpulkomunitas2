<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\thread;
use App\User;
use Input;

class SearchController extends Controller
{
    public function search(Request $request)
    {
    	$keyword = Input::get('query');
    	//if($request->has('query')) {

            // Using the Laravel Scout syntax to search the products table.
            $posts = thread::where('title', 'LIKE', '%' . $keyword . '%')->get();
            $users = User::where('username', 'LIKE', '%' . $keyword . '%')->get();

            return view('search', compact('posts', 'users'));

        //}

        // Return the error message if no keywords existed
        //return view('search');
    }
}

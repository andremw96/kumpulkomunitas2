<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\comment;
use App\thread;
use App\category;
use App\subcategory;
use Redirect;
use Illuminate\Support\Facades\View;

class CommentController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comment = new comment();        
        $comment->comment = $request->commenttxt;
        $comment->user_id = $request->userid;
        $comment->username = $request->username_id;
        $comment->post_id = $request->postid;
        $comment->save();

        //return Redirect::to("forum/content/$comment->post_id");
        return Redirect::back()->with('message','Comment Tersimpan');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($comment_id)
    {
        $IsiComment = comment::findOrFail($comment_id); 
        $post_id = comment::findOrFail($comment_id)->post_id;
        $categoryid = thread::findOrFail($post_id)->category_id;

        $IsiThread = thread::where('post_id', '=', $post_id)->get();       
        $CariKategori = category::where('id', '=', $categoryid)->get();
        return view("forum/editcomment", compact('IsiComment', 'IsiThread', 'CariKategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($comment_id, Request $request)
    {
        $Comment = comment::findOrFail($comment_id); 
        //$input = $request->all();
        //$Comment->fill($input)->save();
        $Comment->comment = $request->comment;
        $Comment->updated_by = $request->updated_by;
        $Comment->save();
        //$Comment->update($request->all());
        //$categoryid = thread::findOrFail($post_id)->category_id;
        $post_id = $Comment->post_id;

        return redirect()->action('ThreadController@show', [$post_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($comment_id)
    {
        $Comment = comment::findOrFail($comment_id);  
        $post_id = $Comment->post_id;
        $Comment->delete();

        // redirect
        \Session::flash('flash_message', 'Comment sudah terhapuss..!!');
        return redirect()->action('ThreadController@show', [$post_id]);
    }
}

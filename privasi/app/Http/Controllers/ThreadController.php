<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\thread;
//use Input;
//use DB;
use Redirect;

class ThreadController extends Controller
{
   /* public function SimpanThread()
    {
        /*$data = array(
            'title' => Input::get('title'),
            'content' => Input::get('content'),
            'user_id' => Input::get('userid'),
            'category_id' => Input::get('category'),
        );

        DB::table('tblpost')->insert($data);
        return Redirect::to('/');
    }

    public function GeneralDiscussion() {
        $GenDisc = thread::where('category_id', '=', 1)->get();

        return view('forum/GeneralDiscussion', compact('GenDisc'));
    }

    public function TheLounge() {
        $Lounge = thread::where('category_id', '=', 8)->get();

        return view('forum/TheLounge', compact('Lounge'));
    }

    public function ForumThread() {
        $forumthread = thread::where('category_id', '=', 8)->get();

        return view('forum/TheLounge', compact('forumthread'));
    }*/


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $thread = new thread();
        $thread->title = $request->title;
        $thread->content = $request->content;
        $thread->user_Id = $request->userid;
        $thread->username = $request->username_id;
        $thread->category_id = $request->category;
        $thread->save();

        return Redirect::to('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $IsiThread = thread::find($id);

        return view("/content", compact('IsiThread'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

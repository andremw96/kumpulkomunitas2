<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\thread;
use App\comment;
use App\subcategory;
use App\category;
use App\Event;
//use Input;
//use DB;
use Redirect;
use Illuminate\Support\Facades\View;
use Auth;
use DateTime;

class ThreadController extends Controller
{
   /* public function SimpanThread()
    {
        $data = array(
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
        return view("/forum/DaftarKategori", compact('allSubCategories'));
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

        $post_id = thread::all()->last()->post_id;
        $categoryid = $thread->category_id;
        $post_id = $thread->post_id;
        //return Redirect::to("forum/content");
        //return Redirect()->route('konten', ['categoryid'=>$categoryid, 'post_id'=>$post_id]);
         return redirect()->action('ThreadController@show', [$post_id]);
        //return Redirect::back()->with('message','Thread Tersimpan');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($post_id)
    {
        $IsiThread = thread::where('post_id', '=', $post_id)->get();
        $IsiComment = comment::where('post_id', '=', $post_id)->get();

        $thread = thread::findOrFail($post_id);
        $categoryid = $thread->category_id;
        $CariKategori = category::where('id', '=', $categoryid)->get();

        $CariEvent = Event::where('post_id', '=', $post_id)->get();

        return view("forum/content", compact('IsiThread', 'IsiComment', 'CariKategori', 'CariEvent'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($post_id)
    {
        $IsiThread = thread::findOrFail($post_id); 
        //$IsiThread = thread::where('post_id', '=', $post_id)->get(); 
        $thread = thread::findOrFail($post_id);
        $categoryid = $thread->category_id;      
        $CariKategori = category::where('id', '=', $categoryid)->get();
        return view("forum/editcontent", compact('IsiThread', 'CariKategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($post_id, Request $request)
    {
        $thread = thread::findOrFail($post_id);
        //$categoryid = $thread->category_id;
        $post_id = $thread->post_id;
        //$input = $request->all();
        //$thread->fill($input)->save();
        $thread->content = $request->content;
        $thread->updated_by = $request->updated_by;
        //$thread->content = Input::get('content');
       // $thread->update($request->all());
        $thread->save();
       //return Redirect::to("forum/content");    
        return redirect()->action('ThreadController@show', [$post_id]);
       // return Redirect()->route('konten', ['categoryid'=>$categoryid, 'post_id'=>$post_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($post_id)
    {
        $thread = thread::findOrFail($post_id);
        $category_id = $thread->category_id;
        $thread->delete();

        // redirect
        \Session::flash('flash_message', 'Thread sudah terhapuss..!!');
        return redirect('/');
    }

    public function BuatAgenda($post_id)
    {
        $thread = thread::findOrFail($post_id);
        return view('forum/BuatAgenda', compact('thread'));
    }

    public function SimpanAgenda(Request $request)
    {
         $time = explode(" - ", $request->input('time'));
          
         $event = new Event;
         $event->user_id = $request->input('userid');
         $event->title = $request->input('title');
         $event->post_id = $request->input('postid');
         $event->komunitas = $request->input('komunitas');
         $event->start_time = $time[0];
         $event->end_time = $time[1];
         $event->save();
          
         \Session::flash('flash_message', 'Event sudah Terbuat..!!');
        return redirect()->action('ThreadController@show', [$request->input('postid')]);
    }

    public function format_interval(\DateInterval $interval)
    {
        $result = "";
        if ($interval->y) { $result .= $interval->format("%y year(s) "); }
        if ($interval->m) { $result .= $interval->format("%m month(s) "); }
        if ($interval->d) { $result .= $interval->format("%d day(s) "); }
        if ($interval->h) { $result .= $interval->format("%h hour(s) "); }
        if ($interval->i) { $result .= $interval->format("%i minute(s) "); }
        if ($interval->s) { $result .= $interval->format("%s second(s) "); }
        
        return $result;
    }
}

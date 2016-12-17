<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\thread;
use App\comment;
use App\subcategory;
use App\category;
//use Input;
//use DB;
use Redirect;
use Illuminate\Support\Facades\View;
use Auth;

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
    public function __construct()
    {
        //$this->category = category::all(array('category'));
       // $this->subcategory = subcategory::all(array('subcategory'));

        //$this->comment = comment::all(array('comment', 'post_id'));
       // $this->post = post::all(array('title', 'content'));
        $subcate=new subcategory;

        try {

            $this->allSubCategories=$subcate->getCategories();
            
        } catch (Exception $e) {
            
            //no parent category found
        }

        view::share('allSubCategories', $this->allSubCategories);
    }


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

        return view("forum/content", compact('IsiThread', 'IsiComment', 'CariKategori'));
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
}

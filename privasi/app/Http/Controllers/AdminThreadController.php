<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\thread;
use App\category;
use DB;

class AdminThreadController extends Controller
{
        public function __construct()
    {
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $thread = DB::table('tblpost')
                ->select(DB::raw('tblpost.post_id, tblpost.title, tblpost.user_id, tblpost.username, category.category, tblpost.created_at, tblpost.updated_at'))
                ->Join('category', 'tblpost.category_id', '=', 'category.id')
                ->paginate(15);

        return view('/admin/adminthread/DaftarThread', compact('thread'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = category::all();
        return view('/admin/adminthread/TambahThread', compact('category'));
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

         return redirect()->action('AdminThreadController@index');
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

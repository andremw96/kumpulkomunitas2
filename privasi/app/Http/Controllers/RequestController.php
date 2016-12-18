<?php

namespace App\Http\Controllers;

use App\RequestCom;
use App\category;
use App\User;
use App\thread;
use DB;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $request = DB::table('requestcom')
                -> select(DB::raw('requestcom.id, requestcom.user_id, users.username, requestcom.namaKomunitas, requestcom.deskipsi, requestcom.disetujui'))
                ->Join('users', 'requestcom.user_id', '=', 'users.id')
                ->paginate(15);

        return view('/admin/request/DaftarRequest', compact('request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {        
        $request = RequestCom::findOrFail($id);
        $category = category::all();
        $userid = $request->user_id;
        $CariUsername = User::findOrFail($userid);
        return view('/admin/request/BuatkanThread', compact('request', 'category', 'CariUsername'));
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
        $thread->request_id = $request->request_id;
        $thread->category_id = $request->category;
        $thread->save();

        $post_id = thread::all()->last()->post_id;

        DB::table('requestcom')
            ->where('id', $request->request_id)
            ->update(['disetujui' => 1, 'post_id' => $post_id]);

        return redirect()->action('RequestController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $IsiRequest = RequestCom::findOrFail($id);
        $userid = $IsiRequest->user_id;
        $CariUsername = User::findOrFail($userid);

        return view('/admin/request/LihatRequest', compact('IsiRequest', 'CariUsername'));
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
        DB::table('requestcom')
            ->where('id', $id)
            ->update(['disetujui' => 2]);

        return redirect()->action('RequestController@index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Auth;
use App\subcategory;
use App\User;
use App\message;
use DB;

class MessageController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();
        //$message = message::where('user_id_pengirim', '=', $user_id)->get();
        $message = DB::table('message')
                 ->select(DB::raw('message.id, message.user_id_pengirim  ,users.username, message.title, message.created_at'))
                 ->join('users', 'message.user_id_penerima', '=', 'users.id')
                 ->where('message.user_id_pengirim', '=', $user_id)
                 ->get();
        return view('message/ListSentMessage', compact('message'));
    }

    public function inbox()
    {
        $user_id = Auth::id();
        //$message = message::where('user_id_pengirim', '=', $user_id)->get();
        $message = DB::table('message')
                 ->select(DB::raw('message.id, message.user_id_pengirim  ,users.username, message.title, message.created_at'))
                 ->join('users', 'message.user_id_pengirim', '=', 'users.id')
                 ->where('message.user_id_penerima', '=', $user_id)
                 ->get();
        return view('Message/ListInbox', compact('message'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $User = User::all();
        return view('message/CreateMessage', compact('User'));
    }

    public function BalasPesan($user_id_pengirim)
    {
        $User = User::findOrFail($user_id_pengirim);
        return view('message/ReplyMessage', compact('User'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = new message();
        $message->user_id_pengirim = $request->userid_pengirim;
        $message->user_id_penerima = $request->userid_penerima;
        $message->title = $request->title;
        $message->isi = $request->isi;
        $message->save();

        return redirect()->action('MessageController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = message::findOrFail($id);
        $userid = $message->user_id_penerima;
        $CariUsername = User::findOrFail($userid);

        return view('/message/ViewSentMessage', compact('message', 'CariUsername'));
    }

    public function ShowInbox($id)
    {
        $message = message::findOrFail($id);
        $userid = $message->user_id_pengirim;
        $CariUsername = User::findOrFail($userid);

        return view('/message/ViewInbox', compact('message', 'CariUsername'));
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

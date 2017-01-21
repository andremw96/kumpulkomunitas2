<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AccountController extends Controller
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
        $account = User::paginate(15);;
        return view('/admin/account/DaftarAccount', compact('account'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/account/TambahAccount');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $account = new user();
        $account->name = $request->name;
        $account->email = $request->email;
        $account->username = $request->username;
        $account->password = bcrypt($request->password);
        $account->gender = $request->gender;
        $account->TglLahir = $request->TglLahir;
        $account->HakAkses = $request->HakAkses;
        $account->save();

        return redirect()->action('AccountController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $IsiAccount = User::findOrFail($id);

        return view('/admin/account/LihatAccount', compact('IsiAccount'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $IsiAccount = User::findOrFail($id);

        return view('/admin/account/EditAccount', compact('IsiAccount'));
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
         $account = user::findOrFail($id);
         $account->name = $request->input('name');
         $account->email = $request->input('email');
         $account->gender = $request->input('gender');
         $account->TglLahir = $request->input('TglLahir');
         $account->HakAkses = $request->input('HakAkses');
         $account->save();
          
         return redirect()->action('AccountController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $account = user::find($id);
         $account->delete();
         
         \Session::flash('flash_message', 'Account sudah terhapuss..!!');
         return redirect()->action('AccountController@index');
    }
}

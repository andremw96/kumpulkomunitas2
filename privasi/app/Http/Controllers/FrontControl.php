<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

use App\category;
use App\subcategory;
use App\RequestCom;
use Auth;
use App\Http\Controllers\Controller;
use DB;

class FrontControl extends Controller
{
    
    var $category;
    var $subcategory;
    var $data;
   // var $comment;
    //var $post;
    var $title;
    var $description;

    protected $allSubCategories;


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

    public function index()
    {
       /* $this->data = category::all(array('cat_id'));
        foreach ($this->data as $list) {
            $categoryid = $list->cat_id;
            $this->subcategory = DB::select("select * from subcategory where cat_id = '$categoryid'");
        }*/
        

    return view('home', compact('allSubCategories'), array('title' => 'Kumpul Komunitas - Home', 'description' => '' , 'page' => 'home'));

    }

    public function about()
    {
    	return view('about', compact('allSubCategories'), array('title' => 'Kumpul Komunitas - About', 'description' => '' , 'page' => 'about'));
    }

    public function DaftarKomunitas()
    {
      if (Auth::guest())
      {
          return view('auth/login');
      }
      else
      {
          return view('Request', compact('allSubCategories'), array('title' => 'Kumpul Komunitas - Request', 'description' => '' , 'page' => 'request'));
      }

    }

    public function SimpanRequest(Request $request)
    {
        $RequestCom = new RequestCom();
        $RequestCom->user_Id = $request->userid;
        $RequestCom->namaKomunitas = $request->namaKomunitas;
        $RequestCom->deskipsi = $request->deskipsi;             
        $RequestCom->save();

        \Session::flash('flash_message','Permintaan Berhasil Dibuat');
        return redirect('/');
    }

    public function contact()
    {
        return view('contact', compact('allSubCategories'), array('title' => 'Kumpul Komunitas - Contact', 'description' => '' , 'page' => 'contact'));
    }

    public function calendar() 
    {
        return view('calender', compact('allSubCategories'), array('title' => 'Kumpul Komunitas - Calendar', 'description' => '' , 'page' => 'calender'));
    }


   /* public function login() {
        return view('login', array('title' => 'Kumpul Komunitas - Login', 'description' => '' , 'page' => 'login'));
    }

    public function logout() {
        return view('login', array('page' => 'login'));
    }

    public function signup() {
        return view('signup', array('title' => 'Kumpul Komunitas - Daftar', 'description' => '' , 'page' => 'signup'));
    }*/

    public function admin() {
        return view('dashboard');
    }
}

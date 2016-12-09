<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\category;
use App\subcategory;
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


    public function __construct()
    {
        //$this->category = category::all(array('category'));
       // $this->subcategory = subcategory::all(array('subcategory'));

        //$this->comment = comment::all(array('comment', 'post_id'));
       // $this->post = post::all(array('title', 'content'));
    }

    public function index()
    {
       /* $this->data = category::all(array('cat_id'));
        foreach ($this->data as $list) {
            $categoryid = $list->cat_id;
            $this->subcategory = DB::select("select * from subcategory where cat_id = '$categoryid'");
        }*/

        $subcate=new subcategory;
        
        try {

            $allSubCategories=$subcate->getCategories();
            
        } catch (Exception $e) {
            
            //no parent category found
        }



    return view('home', compact('allSubCategories'), array('title' => 'Kumpul Komunitas - Home', 'description' => '' , 'page' => 'home'));

    }

    public function about()
    {
    	return view('about', array('title' => 'Kumpul Komunitas - About', 'description' => '' , 'page' => 'about'));
    }

    public function DaftarKomunitas()
    {
    	return view('Request', array('title' => 'Kumpul Komunitas - Request', 'description' => '' , 'page' => 'request'));
    }

    public function contact() {
        return view('contact', array('title' => 'Kumpul Komunitas - Contact', 'description' => '' , 'page' => 'contact'));
    }

    public function calendar() {
        return view('calender', array('title' => 'Kumpul Komunitas - Calendar', 'description' => '' , 'page' => 'calender'));
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

use App\category;
use App\subcategory;
use App\RequestCom;
use App\thread;
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
        $subcate=new subcategory;

        try {

            $allSubCategories=$subcate->getCategories();
            
        } catch (Exception $e) {
            
            //no parent category found
        }

        //view::share('allSubCategories', $allSubCategories);
        
    //$IsiThread = thread::where('category_id', '=', $allSubCategories)->get();
     /*   $JmlhPost = DB::table('tblpost')
                 ->select('post_id', DB::raw('count(*) as total'))
                 ->groupBy('browser')
                 ->get();*/
       // $JmlhPost = thread::groupBy('category_id')->get()->count();

    return view('home', compact("allSubCategories"), array('title' => 'Kumpul Komunitas - Home', 'description' => '' , 'page' => 'home'));

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
      $events = [];

      $events[] = \Calendar::event(
          'Event One', //event title
          false, //full day event?
          '2015-02-11T0800', //start time (you can also use Carbon instead of DateTime)
          '2015-02-12T0800', //end time (you can also use Carbon instead of DateTime)
          0 //optionally, you can specify an event ID
      );

      $events[] = \Calendar::event(
          "Valentine's Day", //event title
          true, //full day event?
          new \DateTime('2015-02-14'), //start time (you can also use Carbon instead of DateTime)
          new \DateTime('2015-02-14'), //end time (you can also use Carbon instead of DateTime)
          'stringEventId' //optionally, you can specify an event ID
      );

      $eloquentEvent = EventModel::first(); //EventModel implements MaddHatter\LaravelFullcalendar\Event

      $calendar = \Calendar::addEvents($events); //add an array with addEvents


        return view("calender", compact('calendar', 'allSubCategories'));
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
        return view('admin/dashboard');
    }
}

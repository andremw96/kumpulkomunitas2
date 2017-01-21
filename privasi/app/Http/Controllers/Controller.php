<?php

namespace App\Http\Controllers;
use App\Tracker;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\subcategory;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $allSubCategories;

    public function __construct()
    {
        //$this->category = category::all(array('category'));
       // $this->subcategory = subcategory::all(array('subcategory'));

        //$this->comment = comment::all(array('comment', 'post_id'));
       // $this->post = post::all(array('title', 'content'));
      Tracker::hit();
        $subcate=new subcategory;

        try {

            $this->allSubCategories=$subcate->getCategories();
            
        } catch (Exception $e) {
            
            //no parent category found
        }

        view::share('allSubCategories', $this->allSubCategories);
    }
}

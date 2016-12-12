<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\subcategory;

class CategoryComposer
{
    //public $subcate = [];
    //public $allSubCategories = [];
    /**
     * Create a movie composer.
     *
     * @return void
     */
    /*public function __construct()
    {
       $subcate=new subcategory;

        try {

            $this->$allSubCategories=$subcate->getCategories();
            
        } catch (Exception $e) {
            
            //no parent category found
        }
    }*/

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    /*public function compose(View $view)
    {
        $view->with('allSubCategories', end($this->allSubCategories));
    }*/
}
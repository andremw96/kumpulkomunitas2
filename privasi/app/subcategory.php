<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

class subcategory
{
    //protected $primaryKey = 'id_subcat';
    //protected $table = 'subcategory';
    //protected $fillable = array('cat_id','subcategory');
    //public $timestamps = false;
    //protected $fillable = array('name', 'created_at_ip', 'updated_at_ip');

    public function getCategories(){

        $categories=\App\Category::where('parent_id',0)->get();//united

        $categories=$this->addRelation($categories);

        return $categories;

    }

    protected function selectChild($id)
    {
        $categories=\App\Category::where('parent_id',$id)->get(); //rooney

        $categories=$this->addRelation($categories);

        return $categories;

    }

    protected function addRelation($categories){

        $categories->map(function ($item, $key) {
            
            $sub=$this->selectChild($item->id); 
            
            return $item=array_add($item,'subCategory',$sub);

        });

        return $categories;
    }
}

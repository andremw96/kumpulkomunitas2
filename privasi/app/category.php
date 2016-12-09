<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

class category extends BaseModel
{
    protected $primaryKey = 'cat_id';
    protected $table = 'category';
    protected $fillable = array('category');
    //public $timestamps = false;
    //protected $fillable = array('name', 'created_at_ip', 'updated_at_ip');
}

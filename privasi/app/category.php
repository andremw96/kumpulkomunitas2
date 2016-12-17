<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class category extends Model
{
	use SoftDeletes;

    protected $primaryKey = 'id';
    protected $table = 'category';
    protected $fillable = array('category');
    	protected $dates = ['deleted_at'];
    //public $timestamps = false;
    //protected $fillable = array('name', 'created_at_ip', 'updated_at_ip');
}

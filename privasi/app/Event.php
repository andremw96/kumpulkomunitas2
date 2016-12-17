<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
	use SoftDeletes;

    protected $table = 'events'; // you may change this to your name table
	protected $primaryKey = 'id'; // the default is id
	protected $dates = ['deleted_at'];
}

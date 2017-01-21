<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class thread extends Model
{
	use SoftDeletes;
	use Searchable;

    protected $primaryKey = 'post_id';
    protected $table = 'tblpost';
    protected $dates = ['deleted_at'];
    protected $fillable = array('title', 'content', 'user_id', 'username','category_id', 'created_at_ip', 'updated_at_ip');
}

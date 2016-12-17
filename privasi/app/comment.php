<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class comment extends Model
{
	use SoftDeletes;
	
    protected $primaryKey = 'comment_id';
    protected $table = 'tblcomment';
    protected $dates = ['deleted_at'];
    protected $fillable = array('comment', 'post_id', 'user_Id', 'created_at_ip', 'updated_at_ip');
}

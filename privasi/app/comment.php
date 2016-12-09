<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $primaryKey = 'comment_id';
    protected $table = 'tblcomment';
    protected $fillable = array('comment', 'post_id', 'user_Id', 'created_at_ip', 'updated_at_ip');
}

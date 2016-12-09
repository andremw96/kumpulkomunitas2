<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class thread extends Model
{
    protected $primaryKey = 'post_id';
    protected $table = 'tblpost';
    protected $fillable = array('title', 'content', 'user_id', 'username','category_id', 'created_at_ip', 'updated_at_ip');
}

<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

class RequestCom extends BaseModel
{
    protected $primaryKey = 'id';
    protected $table = 'requestcom';
    protected $fillable = array('user_id', 'namaKomunitas', 'deskipsi');
    //public $timestamps = false;
    //protected $fillable = array('name', 'created_at_ip', 'updated_at_ip');
}

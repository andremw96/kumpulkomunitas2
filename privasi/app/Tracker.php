<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tracker extends Model
{

    public $attributes = ['hits' => 0];

    protected $fillable = ['ip', 'date'];

    protected $table = 'counters';

    public static function boot() {
        date_default_timezone_set('Asia/Jakarta');
        // When a new instance of this model is created...
        static::creating(function ($tracker) {
            $tracker->hits = 0;
        } );

        // Any time the instance is saved (create OR update)
        static::saving(function ($tracker) {
            $tracker->visit_date = date('Y-m-d');
            $tracker->visit_time = date('H:i:s');
            $tracker->hits++;
        } );
    }

    // Fill in the IP and today's date
    public function scopeCurrent($query) {
        date_default_timezone_set('Asia/Jakarta');
        return $query->where('ip', $_SERVER['REMOTE_ADDR'])
                     ->where('date', date('Y-m-d'));
    }

    public static function hit() {
        date_default_timezone_set('Asia/Jakarta');
        static::firstOrCreate([
                  'ip'   => $_SERVER['REMOTE_ADDR'],
                  'date' => date('Y-m-d'),
              ])->save();
    }

    
}
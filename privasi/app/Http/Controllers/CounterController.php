<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tracker;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CounterController extends Controller
{
	public function __construct()
	{
		
	}

    public function index()
    {
    	$trackers = Tracker::all();
    	return view('admin/statistik', compact('trackers'));
    }
}
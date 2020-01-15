<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\OnLogEvent;
class HomeController extends Controller
{
    public function index($id)
    {
    	event(new OnLogEvent($id));
    	
    	return view('welcome');
    }
}

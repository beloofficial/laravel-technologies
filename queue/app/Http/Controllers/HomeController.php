<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\SaveDatabase;
use App\Film;
use App\Events\SaveDatabaseEvent;

class HomeController extends Controller
{
    public function saveMe($name)
    {
    
    	event(new SaveDatabaseEvent($name));
    	dd($name);
    }
}

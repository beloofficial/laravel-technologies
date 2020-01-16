<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class ChatController extends Controller
{
    public function index()
    {
    	$me = Auth::user();
    	$users = User::where('id','!=',$me->id)->get();
    	dd($users);
    }
}

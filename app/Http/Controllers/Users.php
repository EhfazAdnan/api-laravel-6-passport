<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class Users extends Controller
{
    function list(){
        return User::all();
    }
}

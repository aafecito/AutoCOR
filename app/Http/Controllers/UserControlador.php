<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserControlador extends Controller
{
    public function profile()
    {
        return view('profile');
    }
}

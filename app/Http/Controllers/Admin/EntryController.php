<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EntryController extends Controller
{
    public function loginForm()
    {
        return 'loginForm';
    }

    public function login()
    {
        return 'login';
    }

    public function home()
    {
        return 'home';
    }
}

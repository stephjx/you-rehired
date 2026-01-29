<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleSelectorController extends Controller
{
    public function show()
    {
        return view('auth.role-selector');
    }
}
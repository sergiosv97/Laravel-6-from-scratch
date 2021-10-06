<?php

namespace App\Http\Controllers;

use IlluminatecHttp\Request;
use App\User;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
        return view('profiles.show', compact('user'));
    }
}

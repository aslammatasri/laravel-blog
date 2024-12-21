<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(5);

        return view('user.list-user', compact('users'));
    }

    public function create()
    {

        return view('create');
    }


}

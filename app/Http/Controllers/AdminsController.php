<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;

use Illuminate\Http\Request;

class AdminsController extends Controller
{
    //
    public function index()
    {
        $userCount = User::count();
        $postCount = Post::count();
        return view('admin.index', compact('userCount'), compact('postCount'));
    }
}

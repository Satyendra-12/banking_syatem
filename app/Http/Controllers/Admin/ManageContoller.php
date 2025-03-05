<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ManageController extends Controller
{
    public function postpage()
    {
        dd('Hello');
        $get = Post::get();
        return view('admin.post.post', compact('get'));
    }
}

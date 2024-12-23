<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;
class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tag.index',compact('tags'));
    }
}

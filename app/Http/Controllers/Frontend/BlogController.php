<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use carbon\Carbon;
class BlogController extends Controller
{
    public function index(){
        // need to add the details of the blog here
        $start_of_month = carbon::now()->startOfMonth();
        $end_of_month =carbon::now()->endOfMonth();

        $start_of_last_month = carbon::now()->subMonth()->startOfMonth();
        $end_of_last_month =carbon::now()->subMonth()->endOfMonth();

        $tranding = Post::where('published',1)
                        ->whereBetween('published_at',[$start_of_month,$end_of_month])
                        ->orderBy('published_at','desc')
                        ->limit(5)
                        ->get();

        // $carosole_list = Post::where('id')->get();

        // dd($carosole,$tranding);

        return view('frontend.pages.index',compact('tranding'));
    }


}

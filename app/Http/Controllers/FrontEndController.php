<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Settings;
use App\Category;
use App\Post;
use App\Tag;

class FrontEndController extends Controller
{
    public function index()
    {
        return view('welcome')
                    ->with('title', Settings::first()->site_name)
                    ->with('settings', Settings::first())
                    // ->with('tags', Tag::first()->site_name)
                    ->with('categories', Category::first()->take(3)->get())
                    ->with('first_post', Post::orderBy('created_at','desc')->first())
                    ->with('second_post', Post::orderBy('created_at', 'desc')->skip(1)->take(1)->get()->first())
                    ->with('third_post', Post::orderBy('created_at', 'desc')->skip(2)->take(1)->get()->first())
                    ->with('cat_1', Category::find(1))
                    ->with('cat_3', Category::find(7))
                    ->with('cat_2', Category::find(2));
    }

    public function singlePost($slug)
    {
        // $post = Post::where('slug', $slug)->first();
        // dd($title);
        $post = Post::where('slug', $slug)->first();

        return view('single')
                             ->with('post', $post)
                             ->with('title', Settings::first()->site_name)
                             ->with('categories', Category::take(5)->get())
                             ->with('settings', Settings::first());
                            //  ->with('tag', Tag::take(5)->get()->first());
    }
}

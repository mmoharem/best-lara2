<?php

namespace App\Http\Controllers;
use App\Category;
use App\Post;
use App\Tag;
use Session;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index')->with('posts', Post::all())
            ->withTags(Tag::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        if($categories->count() == 0)
        {
            Session::flash('info', 'You must craete category first');
            return redirect()->route('category.create');
        }

        return view('admin.posts.create')->with('categories', $categories)
                                         ->with('tags', Tag::all());
        // return view('admin.posts.create')->with('categories', Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'title'    => 'required|max:255',
            'featured' => 'required|image',
            'content'  => 'required',
            'category_id' => 'required',
            'tags'        => 'required'
            
        ]);
            // dd($request->all());
        $featured = $request->featured;
        $featured_new_name = time().$featured->getClientOriginalName();
        $featured->move('uploads/posts', $featured_new_name);

        $post = Post::create([
            'title'         =>  $request->title,
            'content'       =>  $request->content,
            'featured'      =>  'uploads/posts/'.$featured_new_name,
            'category_id'   =>  $request->category_id,
            //Create new laravel 5.6 project ===> create-new-laravel-5-6-project
            'slug' => str_slug($request->title),
            // 'tag_id' => $request('tag_id')
        ]);

        // $post->tags()->attach($request('tag_id'));
        $post->tags()->attach($request->tags);

        Session::flash('success', 'Post created succesfully');

        return redirect()->route('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        // $tags = $post->tags;
        return view('admin.posts.edit')->with('post', $post)
        ->with('categories', Category::all())
        ->with('tags', Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $this->validate($request, [
            'title'         => 'required|max:255',
            'content'       => 'required',
            'category_id'   => 'required',
            'tags'          =>  'required|max:255'
        ]);
        
        if($request->hasFile('featured'))
        {
            $featured = $request->featured;
            $featured_new_name = time().$featured->getClientOriginalName();
            $featured->move('uploads/posts', $featured_new_name);
            $post->featured = 'uploads/posts/'.$featured_new_name;
        }

        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->save();
        
        $post->tags()->sync($request->tags);

        Session::flash('success', 'Post updated succesfully');

        return redirect()->route('posts');
    }

    /**
     * Remove the specified resource to trash.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function trash($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        Session::flash('success', 'Post moved to trash succesfully');
        return redirect()->back();
    }


    /**
     * Display a listing of trashe resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewtrash()
    {
        $posts = Post::onlyTrashed()->get();
        return view('admin.posts.trash')->with('posts', $posts);
    }

    /**
     * Restore trashed posts in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {

        $post = Post::withTrashed()->where('id', $id)->first(); 
        
        // dd($post);
        $post->restore();
        Session::flash('success', 'Post restored successofly');
        return redirect()->route('post');

    }


    /**
     * Remove the specified resource perminantly from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first(); 
                //using ->first() instead of ->get(); Because get return array of object. 
        
        // dd($post);
        $post->forceDelete();
        Session::flash('success', 'Post delete permenently');
        return redirect()->back();
    }
}

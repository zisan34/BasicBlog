<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Setting;

use App\Category;

use App\Post;

use App\Tag;


use Illuminate\Support\Arr;
class FrontEndController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*testing*/
        $cat=Category::all();
        $size = count($cat)-1;
        for ($i=0; $i<$size; $i++) {
        for ($j=0; $j<$size-$i; $j++) {
            $k = $j+1;
            if ($cat[$k]->posts->count() > $cat[$j]->posts->count()) {
                // Swap elements at indices: $j, $k
                list($cat[$j], $cat[$k]) = array($cat[$k], $cat[$j]);
            }
        }
        }
        // dd($cat);
        /*ending testing*/
        return view('index')
        ->with('title',Setting::first()->site_name)
        ->with('settings',Setting::first())
        ->with('categories',Category::orderBy('updated_at','desc')->take(5)->get())
        ->with('first_post',Post::orderBy('created_at','desc')->first())
        ->with('second_post',Post::orderBy('created_at','desc')->skip(1)->first())
        ->with('third_post',Post::orderBy('created_at','desc')->skip(2)->first())
        ->with('sorted_categories',$cat)
        ->with('tags',Tag::all());
    }

    public function singlePost($id)
    {
        $id=decrypt($id);
        $post=Post::find($id);
        if(count($post)>0)
        {
        $next_id=Post::where('id','>',$post->id)->min('id');
        $prev_id=Post::where('id','<',$post->id)->max('id');

        return view('singlePost')
        ->with('title',$post->title)  
        ->with('post',$post)
        ->with('categories',Category::orderBy('updated_at','desc')->take(5)->get())
        ->with('settings',Setting::first())
        ->with('tags',Tag::all())
        ->with('next_post',Post::find($next_id))
        ->with('prev_post',Post::find($prev_id));
        }
        return redirect(route('index'));
    }

    public function category($id)
    {
        $category=Category::find($id);

        if(count($category)>0)
        {
            return view('category')
        ->with('title',$category->name)
        ->with('settings',Setting::first())
        ->with('tags',Tag::all())
        ->with('categories',Category::orderBy('updated_at','desc')->take(5)->get())
        ->with('category',$category);
        }
        return redirect()->back();


    }

    public function tag($id)
    {
        $tag=Tag::find($id);
        if(count($tag)>0)
        {
            return view('tag')
        ->with('title',$tag->tag)
        ->with('settings',Setting::first())
        ->with('tags',Tag::all())
        ->with('categories',Category::orderBy('updated_at','desc')->take(5)->get())
        ->with('posts',$tag->posts);

        }
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // testing
    public function testing(){

    }
}

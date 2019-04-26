<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\Category;
use App\Post;
use App\Tag;

use Session;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts=Post::orderBy('updated_at','desc')->get();
        return view('admin.posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories=Category::all();
        $tags=Tag::all();
        if(count($categories)==0||count($tags)==0)
        {
            Session::flash('info','You must have some categories and tags before attempting to create a post.');

            return redirect()->back();
        }
        $user_id=Auth::id();
        return view('admin.posts.create')->with('categories',$categories)->with('user_id',$user_id)->with('tags',$tags);

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

        // dd($request->all());

        if($request->user_id==Auth::id())
        {
        $this->validate($request,[
            'title'=>'required|max:255',
            'featured'=>'required|image',
            'content'=>'required',
            'category_id'=>'required',
            'tags'=>'required']);

        $featured=$request->featured;
        $featured_new=time().'_'.$request->user_id.'_'.$featured->getClientOriginalName();

        // dd($featured_new);

        $post=new Post;
        $post->title=$request->title;
        $post->content=$request->content;
        $post->featured='/uploads/post/'.$featured_new;
        $post->category_id=$request->category_id;
        $post->user_id=$request->user_id;
        $post->slug=str_slug($request->title);



        if($post->save())
        {
            // dd($post);
        $featured->move('uploads/post',$featured_new);

        $post->tags()->attach($request->tags);


        Session::flash('success','Post created successfully.');
        return redirect(route('posts'));

        }

        }   
        return redirect(route('home'))->with('error','Dont try to be smart!');




        

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

        $post=Post::find($id);

        if($post->user_id==Auth::id())
        {
            return view('admin.posts.edit')->with('post',$post)->with('categories',Category::all())->with('tags',Tag::all());
        }
        else
        {
            Session::flash('success','Nice try!');
            return redirect()->back();
        }
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

        $post=Post::find($id);

        if($post->user_id==Auth::id())
        {
        $this->validate($request,[
            'title'=>'required|max:255',
            'content'=>'required',
            'category_id'=>'required']);

        if($request->hasFile('featured'))
        {
            $featured=$request->featured;
            $featured_new=time().'_'.$post->user_id.'_'.$featured->getClientOriginalName();
            $featured->move('uploads/post',$featured_new);
            $post->featured='/uploads/post/'.$featured_new;




        }

        // dd($featured_new);

        $post->title=$request->title;
        $post->content=$request->content;
        $post->category_id=$request->category_id;
        $post->slug=str_slug($request->title);



        if($post->save())
        {
            $post->tags()->sync($request->tags);
            
            Session::flash('success','Post Updated Successfully.');
        return redirect(route('posts'));

        }
        }   
        return redirect(route('home'))->with('error','Dont try to be smart!');


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
        $post=Post::find($id);

        $post->delete();

        Session::flash('success','The post was just trashed.');

        return redirect(route('posts'));
    }

    public function trashed()
    {
        $posts=Post::onlyTrashed()->get();

        return view('admin.posts.trashed')->with('posts',$posts);
    }

    public function kill($id)
    {
        $post=Post::onlyTrashed()->where('id',$id)->first();
        if(count($post)==0)
        {
            Session::flash('success','Nice try');
            return redirect()->back();
        }
        if($post->forceDelete())
        {
            Session::flash('success','Post deleted permanently.');
            return redirect()->back();
        }
    }
    public function restore($id)
    {
        // $post=Post::withTrashed()->where('id',$id)->first();

        $post=Post::onlyTrashed()->where('id',$id)->first();


        if(count($post)>0)
        {
            $post->restore();
            Session::flash('success','Post successfully restored.');
            return redirect()->route('posts');
        }
        Session::flash('success','Nice try!');
        return redirect()->route('home');

    }
}

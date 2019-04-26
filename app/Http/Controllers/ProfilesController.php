<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Session;
use App\Profile;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.users.profile')->with('user',Auth::user());
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
    public function update(Request $request)
    {
        //

        $user=Auth::user();

        $this->validate($request,[
            'name'=>'required|max:255',
            'email'=>'required|email',
            'facebook'=>'required|url',
            'youtube'=>'required|url'
        ]);

        if($request->hasFile('avatar'))
        {
            $avatar=$request->avatar;
            $avatar_new=time().'_'.$user->id.'_'.$avatar->getClientOriginalName();
            $avatar->move('uploads/avatar',$avatar_new);
            $user->profile->avatar='/uploads/avatar/'.$avatar_new;
            $user->profile->save();
        }

        // dd($featured_new);

        $user->name=$request->name;
        $user->email=$request->email;
        $user->profile->facebook=$request->facebook;
        $user->profile->youtube=$request->youtube;
        $user->profile->save();
        $user->save();

        if($request->has('password'))
        {
            $user->password=$request->password;
            $user->save();
        }




        Session::flash('success','Profile Updated Successfully.');
        return redirect()->back();

        

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
}

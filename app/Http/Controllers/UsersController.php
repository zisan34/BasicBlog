<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Profile;
use Auth;

use Session;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.users.index')->with('users',User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.users.create');
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
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email'
        ]);

        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt('password')
        ]);
        $profile=Profile::create([
            'user_id'=>$user->id
        ]);

        Session::flash('success','User added successfully');
        return redirect(route('users'));
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
        $user=User::find($id);

        if($user->id!==Auth::user()->id)
        {
            $user->profile->delete();
            $user->delete();

            Session::flash('success','User permanently deleted.');
            return redirect()->back();

        }
        Session::flash('info','To delete your own profile you have to contact another admin.');
        return redirect()->back();

    }

    public function tooglePermission($id)
    {
        $user=User::find($id);
        if($user->admin==0)
        {
            $user->admin=1;
        if($user->save())
        {
            Session::flash('success','Made the user admin successfully!');
        }
            
        }
        else
        {
            $user->admin=0;
            if($user->save())
        {
            Session::flash('success','Removed the user from admin successfully!');
        }
            

        } 
        return redirect()->back();
    }
}

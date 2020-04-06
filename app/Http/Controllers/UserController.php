<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Menu;
use App\Role;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->firstname = $request["firstname"];
        $user->lastname = $request["lastname"];
        $user->email = $request["username"];
        $user->password = Hash::make($request["password"]);
        $user->doc = $request["doc"];
        $user->correo = $request["correo"];
        $user->role_id = $request["rol"];
        $user->status = 1;
        $user->save();

        if($request->file('profile')) {
            $request->file('profile')->move('img/upload/users/',  $user->doc.'.'.$request->file('profile')->getClientOriginalExtension());
            $user->fill(['profile' => 'img/upload/users/'.$user->doc.'.'.$request->file('profile')->getClientOriginalExtension()])->save();
        }

        return $user;
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
        $user = User::find($id);
        $user->firstname = $request["firstname"];
        $user->lastname = $request["lastname"];
        $user->email = $request["username"];
        $user->password = Hash::make($request["password"]);
        $user->doc = $request["doc"];
        $user->correo = $request["correo"];
        $user->role_id = $request["rol"];
        $user->status = 1;
        $user->save();

        if($request->file('profile')) {
            $request->file('profile')->move('img/upload/users/',  $user->doc.'.'.$request->file('profile')->getClientOriginalExtension());
            $user->fill(['profile' => 'img/upload/users/'.$user->doc.'.'.$request->file('profile')->getClientOriginalExtension()])->save();
        }

        $usuario = User::all();

        return $usuario;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $elim = User::findOrFail($id);
        $elim->delete();
    }

}

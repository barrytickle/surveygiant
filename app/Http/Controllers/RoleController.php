<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Http\Requests;
use App\role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        foreach(Auth::user()->role as $role){
        if($role->name == 'Admin'){
            $role = role::all();
            return view('admin.role.index', compact('role'));
        }
            return redirect('/');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = role::create($request->all());
        $role->save();
        return redirect('/admin/role');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //will check if the role of the user logged in is an admin
        foreach(Auth::user()->role as $role){
            if($role->name == 'Admin'){
                //if the user is an admin, the role and view will be loaded
                $roles = role::findOrFail($id);
                return view('admin.role.show', compact('roles'));
            }
            // if the user is not an admin then they will be redirected
            return redirect('/');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //will check if the role of the user logged in is an admin
        foreach(Auth::user()->role as $role){
            if($role->name == 'Admin'){
                //if the user is an admin, the role and view will be loaded
                $role = role::findOrFail($id);
                return view('admin.role.edit', compact('role'));
            }
            // if the user is not an admin then they will be redirected
            return redirect('/');
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
        /*
         * Note you do not need to require authentication checks for this metho
         */
        //will check the db for the row matching the ID
        $role = role::findOrFail($id);
        //if an ID has been found it will update the row with the elements from the form
        $role->update($request->all());
        //if successful the system will redirect the admin to the roles page.
        return redirect('/admin/role');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /*
         * Note you do not need to require authentication checks for this metho
         */
        //system will check for role rows matching id
        $role = role::findOrFail($id);
        //if role has been found system will delete role
        $role->delete();
        //system will redirect user when role has been deleted.
        return redirect('/admin/role');
    }
}

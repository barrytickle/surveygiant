<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\User;
use App\surveys;
use App\category;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //will check to see if the user is an admin.
        foreach(Auth::user()->role as $role){
            //
            if($role->name == 'Admin'){

                $user = User::all();
                return view('admin.user.index', compact('user'));
            }
            //if the user is not an admin they will be redirected.
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

        //will check to see if the user is an admin.
        foreach(Auth::user()->role as $role){
            if($role->name == 'Admin'){
                /*
                 * if the user is an admin, it will load all user data and return it to the view
                 * Will also show all surveys corresponding to that user.
                 */
                $user = User::findOrFail($id);
                $surveys = surveys::all();
                //will loop through surveys array to find all authors with same id
                foreach($surveys as $surv){
                    $survey = surveys::all()->where('author_id', $surv->author_id);
                    //will return all data to the view.
                    return view('admin.user.show', compact('user', 'survey'));
                }
            }
           //if the user is not admin they will be redirected.
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
        /*
         * Note: this view will only be designed to give users warnings.
         */

        //will check to see is user is admin
        foreach(Auth::user()->role as $role){
            if($role->name == 'Admin'){
                //will load all data relating to that user.
                $user = User::findOrFail($id);

                return view('admin.user.edit', compact('user'));
            }
            //if user is not admin they will be redirected.
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
        //will check db for user with ID
        $user = User::findOrFail($id);
        //will update with all fields from form.
        $user->update($request->all());
        //will redirect back to admin user page.
        return redirect('/admin/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //will find user from db via the id
        $user = User::findOrFail($id);
        //will delete row from database where the id matches
        $user->delete();
        //will redirect back to admin user.
        return redirect('/admin/user');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\category;
use App\surveys;
use App\User;

class AdminCategoryController extends Controller
{

    /**
     * Securing the set of pages to a member who is logged in.
     */
    public function __construct(){
        // will require the admin to be logged in before any methods can be used
        $this->middleware('auth');
        foreach(Auth::user()->role as $role){
            if($role->name != 'Admin'){
                return redirect('/');
            }
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //checks to see if the role is an admin
        foreach(Auth::user()->role as $role){
            if($role->name == 'Admin'){
                //if the role is an admin will grab all the fields from category table
                $category = category::all();
                //will return view for the category table
                return view('admin.category.index', compact('category'));
            }
            //if the user logged in is not admin it will redirect them to the home page
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
        //checks to see if the role is an admin
        foreach(Auth::user()->role as $role){
            if($role->name == 'Admin'){
                //if user is admin will return the create view
                return view('admin.category.create');
            }
            //if user is not admin they will be redirected
            return redirect('/');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //when a new category is stored a request to the db will be created requesting all input fields from the form
        $cat = category::create($request->all());
        // all the fields will then be saved into the db as a new element
        $cat->save();
        //redirect to the admin category has been made
        return redirect('/admin/category/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //will check to see if user logged in is an admin
        foreach(Auth::user()->role as $role){
            if($role->name == 'Admin'){
                //will find the category corresponding to the ID of the url
                $category = category::findOrFail($id);
                //will return all data from surveys
                $survey = surveys::all();
                //will return the view bringing in the data from category and survey
                return view('admin.category.show', compact('category', 'survey'));
            }
            //if user is not admin they will be redirected
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
        //checks the role of the user
        foreach(Auth::user()->role as $role) {
            if($role->name == 'Admin') {
                //if user is admin they will find all categories corresponding to id
                $category = category::findOrFail($id);
                //return the view with the right category
                return view('admin.category.edit', compact('category'));
            }
            else{
                //user will be redirected back to the home page
                return redirect('/');
            }
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
         * Note: No admin checks are required as form will only be able to call this method.
         */

        //will search the db for the category id
        $cat = category::findOrFail($id);
        //will update where the ID has been found with the new data from the input
        $cat->update($request->all());
        // will be redirected back to admin category
        return redirect('/admin/category');
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
         * Note: No admin checks are required as form will only be able to call this method.
         */

        //will search the db for the id in the url
        $cat = category::findOrFail($id);
        // will delete the row where the id's match
        $cat->delete();
        // will redirect back to admin category
        return redirect('/admin/category');
    }
}

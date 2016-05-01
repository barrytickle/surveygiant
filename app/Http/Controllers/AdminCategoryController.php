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
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        foreach(Auth::user()->role as $role){
        if($role->name == 'Admin'){
            $category = category::all();
            return view('admin.category.index', compact('category'));
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
        foreach(Auth::user()->role as $role){
            if($role->name == 'Admin'){
                return view('admin.category.create');
            }
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
        $cat = category::create($request->all());
        $cat->save();
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
        foreach(Auth::user()->role as $role){
            if($role->name == 'Admin'){
                $category = category::findOrFail($id);
                $survey = surveys::all();
                return view('admin.category.show', compact('category', 'survey'));
            }
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
        $category = category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
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
        $cat = category::findOrFail($id);
        $cat->update($request->all());
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
        $cat = category::findOrFail($id);
        $cat->delete();
        return redirect('/admin/category');
    }
}

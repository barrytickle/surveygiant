<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;

use App\surveys;

class AdminSurveyController extends Controller
{

    /**
     * Securing the set of pages to a member who is logged in.
     */
    public function __construct(){
        $this->middleware('auth');
        // requires the admin to be logged in
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //checks to see if the user logged in has admin rights
        foreach(Auth::user()->$role as $role) {
            if($role == 'Admin') {
                // will get  all data from surveys if admin
                $survey = surveys::all();
                //will return view with survey data
                return view('admin.survey.index', compact('survey'));
            } else{
                return redirect('/');
            }
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
        /*
         * Note: No admin checks are required as form will only be able to call this method.
         */

        //will check the database for the survey ID
        $surveys = surveys::findOrFail($id);
        //if ID has been found corresponding row will be deleted
        $surveys->delete();
        //admin will be redirected to survey page
        return redirect('/admin/survey');
    }
}

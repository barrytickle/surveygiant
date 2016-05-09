<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Http\Requests;
use App\surveys;
use App\category;
use App\response;



class SurveyController extends Controller
{

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //will check to see if the user is logged in
        if(Auth::guest()){
            //if user is not logged in they will be redirected to the login page
            return redirect('/login');
        }else {
            //if user is logged in the rows will be loaded to the view.
            $cats = category::lists('CategoryName', 'id');
            return view('survey.create', compact('cats', 'slug'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
         * Note: no authentication is required for this method.
         */

        //system will create a request to the db to store all elements in the input field
        $survey = surveys::create($request->all());
        //system will store the author id to the user who is logged in
        $survey->author_id = Auth::user()->id;
        //the system will create a slug from the current date and time and a combination of 3 random numbers.
        $survey->slug = Auth::user()->id . rand(0, 1000) . rand(0, 1000) . rand(0, 1000) . date("Ymd") . date("dmY");
        //the system will create another attachment for the category, to add to the pivot table.
        $survey->category()->attach($request->input('category'));
        //system will save the request to the db
        $survey->save();
        //a redirect will be made to the users personal page.
        return redirect('/me/'. Auth::id());
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //will load all rows in database where the slug equals the id in the url
        $survey = surveys::all()->where('slug', $id);
        //if an id has been found the system will check to see if the user has been logged in
        foreach($survey as $surveys){
            if(Auth::guest()) {
                //if the user isn't logged in, it will check to see if the survey has been published.
                if ($surveys->published == 1) {
                    //if the survey has been published the survey will load
                    return view('survey.show', ['survey' => $survey]);
                }
                //if the survey hasn't been published then the system will check to see if the user ID matches the survey author
            } else if(Auth::user()->id == $surveys->author_id){
                //if the survey author matches the user logged in and the survey isn't published, then the survey will load
                return view('survey.show', ['survey' => $survey] );
            } else{
                //if the survey isn't published and the user isn't logged in, or if the user doesn't match the id of the author,
                //they will be redirected
                return redirect('/');
            }

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //system will check to see if the db has the row with the corresponding id
        $survey = surveys::findOrFail($id);
        //will check to see if the user isn't logged in, or if the user logged in is the owner of the survey.
        if(Auth::guest() || Auth::id() != $survey->author_id){
            //if the user isn't the owner of the survey, they will be redirected.
            return redirect('/');
        } else{
            //if the user is the owner of the survey, they will load the survey with al categories
            $cats = category::lists('CategoryName', 'id');
            return view('survey.edit', compact('survey', 'cats'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //will check the database to find the corresponding survey.
        $survey = surveys::findOrFail($id);
        /*
         * if the survey has been found, the system will check to see if published has been checked
         * if published has been checked, it will update the field to a 1, else it will leave it as 0.
         */
        if(!empty($request->get('publish'))){
            $survey->published = 1;
        }
        else{
            $survey->published = 0;
        }

        //after the check has been made the system will update the survey.
        $survey->update($request->all());
        //will add the category into the surveys pivot table
        foreach($survey->category as $surveys){
            $surveys->update($request->input('category'));
        }
        //will save request
        $survey->save();
        // will return to the right page.
        return redirect('/me/'.Auth::id());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /*
         * Note: no authentication is required for this method.
         */
        //will find the survey in the db.
        $survey= surveys::find($id);
        // will delete the survey in the db.
        $survey->delete();
        //will return the user to their personal page.
        return redirect('/me/'.Auth::id());

    }

    /**
     * Newly created method to add any responses to the corresponding survey.
     *
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function response(Request $request)
    {
        /*
         * will check all fields with the name sur.
         * Note: sur is an array that will contain all questionnaire ID's related to that survey.
         */
        $input = Input::get('sur');

        //a foreach loop is created to seperate the question_id and the response.
        foreach($input as $key => $response)
        {
            //will create a request in the repsonse table
            $resp = response::create($request->all());
            //will use the response to add to the ResponeName field
            $resp->ResponseName = $response;
            //will attach the question_id ($key) to the pivot table
            $resp->question()->attach($key);
            //will save request
            $resp->save();
        }

        // will be redirected to home page.
        return redirect('/');
    }
}

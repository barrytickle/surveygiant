<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;

use App\surveys;
use App\question;

class QuestionController extends Controller
{

    /**
     * Securing the set of pages to a member who is logged in.
     */
    public function __construct(){
        //requires user to be logged in
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // wll return index view
       return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //will get all rows with the corresponding slug (will only return 1 row)
        $survey = surveys::all()->where('slug', $id);
        //check to see if the user logged in is the owner of the survey
        foreach($survey as $surveys){
            if($surveys->author_id == Auth::id()){
                //if the user is the owner of the survey the view will load as normal
                return view('questions.create', compact('survey'));
            }else{
                //user will be redirected if they do not own the survey
                return redirect('/');
            }
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
        /*
         * Note, no authentication is required for this method.
         */

        //question will create a request to input into question table
        $question = question::create($request->all());
        // a request will be made for the ID of the survey, to attach into hte pivot table
        $question->surveys()->attach($request->input('id'));
        //A request has been made to check the question type, question type will save as the choice the user has picked
        $question->QuestionType = $request->input('QuestionType');
        // the query will store
        $question->save();
        //redirect will be made back to the question ID

        return redirect('/question/'.$request->input('slug'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //will get all rows from database where the slug matches the ID field
        $survey = surveys::all()->where('slug', $id);
        // will check to see if user owns the survey
        foreach($survey as $surveys){
            if($surveys->author_id == Auth::id()){
                // will return the view if the user owns survey
                return view('questions.show', compact('survey'));
            }else{
                //will redirect if user does not own survey
                return redirect('/');
            }
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
        // will check the db for a row containing the specific ID
        $question = question::findOrFail($id);
        foreach($question->surveys as $survey){
            if($survey->author_id == Auth::id()){
                //if id has been found it will check the parent survey to see if the user owns the question
                //if the user owns the question the question view will appear
                return view('questions.edit', compact('question'));
            } else{
                //if the user doesn't own the question they will be redirected
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
        $question = question::findOrFail($id);
        $question->QuestionType = $request->input('QuestionType');
        $question->update($request->all());
        return redirect('/me/survey');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = question::find($id);
        $question->delete();
        return redirect('/me/survey');
    }
}

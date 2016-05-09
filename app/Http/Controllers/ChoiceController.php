<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;

use App\surveys;
use App\question;
use App\choice;


class ChoiceController extends Controller
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
    public function create($id)
    {
        $question = question::findOrFail($id);
        foreach($question->surveys as $surveys) {
            //will check to see if the current user created the question
            if ($surveys->author_id == Auth::id()) {
                //if user created the question, question view will load
                return view('choice.create', compact('question'));
            } else {
                //if user does not own question, they will be redirectted
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
         * Note, no authorisation checks are required for this method.
         */
        //Will create a request gathering all input fields
        $choice = choice::create($request->all());
        //Will attach to pivot table the question id and choice id
        $choice->question()->attach($request->input('id'));
        // will save to db
        $choice->save();
        // will redirect to the choice id path.
        return redirect('/choice/'.$request->input('id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = question::findOrFail($id);
        //will check to see if user owns question.
        foreach($question->surveys as $surveys) {
            if($surveys->author_id == Auth::id()) {
                //will check the question type, if it is not radio it will be redirected.
                if ($question->QuestionType != 'Radio') {
                    return redirect('/');
                } else {
                    // if the question type if a radio question it will load the view.
                    return view('choice.show', compact('question'));
                }
            } else{
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
        $choice = choice::findOrFail($id);
        // will check to see if the user owns the question attached to the choice.
        foreach($choice->question as $quest){
            foreach($quest->surveys as $survey){
                if($survey->author_id == Auth::id()){
                    //if user owns the question the view will load
                    return view('choice.edit', compact('choice'));
                } else{
                    // if user does not own the view they will be redirected
                    return redirect('/');
                }
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
         * Note, no authorisation checks are required for this method.
         */
        //will find the choice with the corresponding ID in the database.
        $choice = choice::findOrFail($id);
        // will update the fields with the current fields in the form
        $choice->update($request->all());
        // will be redirected.
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
        /*
         * Note, no authorisation checks are required for this method.
         */
        //will search db for choice
        $choice = choice::findOrFail($id);
        //will delete row where id is found
        $choice->delete();
        // will redirect back.
        return redirect('/me/survey');
    }
}

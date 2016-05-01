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

        $cats = category::lists('CategoryName', 'id');
        return view('survey.create', compact('cats', 'slug'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $survey = surveys::create($request->all());
        $survey->author_id = Auth::user()->id;
        $survey->slug = Auth::user()->id . rand(0, 1000) . rand(0, 1000) . rand(0, 1000) . date("Ymd") . date("dmY");
        $survey->category()->attach($request->input('category'));
        $survey->save();

        return redirect('/me/survey');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $survey = surveys::all()->where('slug', $id);
            return view('survey.show', ['survey' => $survey]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $survey = surveys::findOrFail($id);
        $cats = category::lists('CategoryName', 'id');
        return view('survey.edit', compact('survey', 'cats'));
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
        $survey = surveys::findOrFail($id);
        if(!empty($request->get('publish'))){
            $survey->published = 1;
        }
        else{
            $survey->published = 0;
        }
        $survey->update($request->all());
        foreach($survey->category as $surveys){
            $surveys->update($request->input('category'));
        }

        $survey->save();
        return redirect('/me/survey');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $survey= surveys::find($id);
        $survey->delete();
        return redirect('/me/survey');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function response(Request $request)
    {
        $input = Input::get('sur');

        foreach($input as $key => $response)
        {
            $resp = response::create($request->all());
            $resp->ResponseName = $response;
            $resp->question()->attach($key);
            $resp->save();
        }

        return redirect('/');
    }
}

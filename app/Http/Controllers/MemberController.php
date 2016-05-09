<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\surveys;

use Auth;

class MemberController extends Controller
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
        // will return index view.
        return view('me.index');
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
        //checks to see if the url visited is the right user.
        if(Auth::id() == $id) {
            //checks the OS, bug fix between OSX and Linux
            $os = strtoupper(substr(PHP_OS, 0, 3));
            //if the OS is linux, it will return content of the id in the url
            if ($os == 'LIN') {
                $surveys = surveys::all()->where('author_id', $id);
            } else {
            //if the OS is osx, it will return content of the id connected to the logged in user
                $surveys = surveys::all()->where('author_id', Auth::id());
            }
            //returns the show view
            return view('me.show', compact('surveys'));
        }else{
            //will redirect the user to the correct url if the url they have entered is wrong
            return redirect('/me/'.Auth::id());
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

    }

}

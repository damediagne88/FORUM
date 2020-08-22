<?php

namespace App\Http\Controllers;

use App\Topic;
use Illuminate\Http\Request;
use App\User;

class TopicController extends Controller
{

    public function __construct(){

        $this->middleware('auth')->except(['index','show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics = Topic::Latest()->paginate(10);

        return view('topics.index',compact('topics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('topics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([

            'title' => ['required'],
            'content' =>['required','min:10']
        ]);

        Topic::create([
            'title' => request('title'),
            'content' => request('content'),
            'user_id' =>auth()->user()->id
        ]);

        flash('TOPICS CREATE ')->success();

        return back();


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function show(Topic $topic)
    {
        return view('topics.show',compact('topic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function edit(Topic $topic)
    {
        return view('topics.edit',compact('topic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Topic $topic)
    {

        request()->validate([

            'title' => ['required'],
            'content' =>['required','min:10']
        ]);

        $topic->update([
            'title' => request('title'),
            'content' => request('content'),
            'user_id' =>auth()->user()->id
        ]);

        flash('TOPICS UPDATE ')->success();

        return redirect()->route('topics.show',$topic);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topic $topic)
    {
        //
    }
}

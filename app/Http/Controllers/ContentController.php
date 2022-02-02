<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Language;
use App\Models\Lesson;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = Content::all();
        return view('content.index', ['models'=>$model]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lessons = Lesson::all();
        $languages = Language::all();
        return view('content.create', ['lessons' => $lessons, 'languages' => $languages]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new Content();
        $model->explanation = $request->explanation;
        $model->example = $request->example;
        $model->lesson_id = $request->lesson;
        $model->save();
        return redirect()->route('content.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Content::find($id);
        $lessons = Lesson::all();
        return view('content.update',['model'=>$model, 'lessons'=>$lessons]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = Content::find($id);
        $model->explanation = $request->explanation;
        $model->example = $request->example;
        $model->lesson_id = $request->lesson;
        $model->save();
        return redirect()->route('content.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Content::find($id)->delete();
        return redirect()->route('content.index');
    }
}

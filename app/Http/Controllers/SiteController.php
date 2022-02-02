<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Language;
use App\Models\Lesson;
use Illuminate\Http\Request;
use function MongoDB\BSON\toJSON;

class SiteController extends Controller
{
    public function index(){
        $languages = Language::all();
        $lessons = Lesson::where('language_id', 1)->get();
        $contents = Content::where('lesson_id', 1)->get();
        return view('index', ['languages'=>$languages, 'lessons'=>$lessons, 'contents'=>$contents]);
    }
    public function lesson($lang_id, $lesson_id){
        $languages = Language::all();
        $lessons = Lesson::where('language_id', $lang_id)->get();
        $contents = Content::where('lesson_id', $lesson_id)->get();
        return view('index', ['languages'=>$languages, 'lessons'=>$lessons, 'contents'=>$contents]);
    }
    public function apiLesson($id){
        return response()->json(Lesson::where('language_id', $id)->get());
    }
}

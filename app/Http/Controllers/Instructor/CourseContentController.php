<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseChapter;
use App\Models\CourseChapterLesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseContentController extends Controller
{
    public function createChapter(Request $request){
        $course = Course::findOrFail($request->course_id);
        return view('instructor.course.partials.course-content-add-chapter', compact('course'))->render();
    }


    public function storeChapter(Request $request){
        $request->validate([
            'title' => ['required', 'string'],
        ]);

        $chapter = new CourseChapter();
        $chapter->title = $request->title;
        $chapter->instructor_id = Auth::user()->id;
        $chapter->course_id = $request->course_id;
        $chapter->order = CourseChapter::where('course_id', $request->course_id)->count() + 1;
        $chapter->save();
        notyf()->success('Chapter created successfully.');
        return redirect()->back();
    }


    public function createLesson(Request $request){
           $course_id = $request->course_id;
           $chapter_id = $request->chapter_id;
           return view('instructor.course.partials.course-content-add-lesson', compact('course_id', 'chapter_id'))->render();
    }


    public function storeLesson(Request $request){
        //dd($request->all());
        $request->validate([
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'file_type' => ['required'],
            'downloadable' => ['required'],
            'is_preview' => ['required']
        ]);

           $source = null;
        if ($request->demo_video_storage === 'upload') {
            $source = $request->path;
        } else {
            $source = $request->url;
        }

        $lesson = new CourseChapterLesson();
        $lesson->title = $request->title;
        $lesson->file_path = $source;
        $lesson->slug = \Str::slug($request->title);
        $lesson->description = $request->description;
        $lesson->instructor_id = Auth::user()->id;
        $lesson->course_id = $request->course_id;
        $lesson->chapter_id = $request->chapter_id;
        $lesson->volume = $request->volume;
        $lesson->duration = $request->duration;
        $lesson->file_type = $request->file_type;
        $lesson->downloadable = $request->downloadable;
        $lesson->is_preview = $request->is_preview;
        $lesson->order = CourseChapterLesson::where('chapter_id', $request->chapter_id)->count() + 1;
        $lesson->storage = $request->demo_video_storage;
        $lesson->status = 'active';
        $lesson->lesson_type = 'lesson'; 
        $lesson->approve_status = 'pending';
        $lesson->save();
        return redirect()->back();
    }



    public function editLesson(Request $request){
        $editMode = true;
        $course_id = $request->course_id;
        $chapter_id = $request->chapter_id;
        $lesson_id = $request->lesson_id;
        $lesson = CourseChapterLesson::where(['id' => $lesson_id, 'instructor_id' => Auth::user()->id])->first();
        return view('instructor.course.partials.course-content-add-lesson', compact('course_id', 'chapter_id', 'lesson', 'editMode'))->render();
    }


    public function updateLesson(Request $request){
        //dd($request->all());
           $request->validate([
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'file_type' => ['required'],
            'downloadable' => ['required'],
            'is_preview' => ['required']
        ]);

           $source = null;
        if ($request->demo_video_storage === 'upload') {
            $source = $request->path;
        } else {
            $source = $request->url;
        }

        $lesson = CourseChapterLesson::findOrFail($request->lesson_id);
        $lesson->title = $request->title;
        $lesson->file_path = $source;
        $lesson->slug = \Str::slug($request->title);
        $lesson->description = $request->description;
        $lesson->volume = $request->volume;
        $lesson->duration = $request->duration;
        $lesson->file_type = $request->file_type;
        $lesson->downloadable = $request->downloadable;
        $lesson->is_preview = $request->is_preview;
        $lesson->storage = $request->demo_video_storage;
        $lesson->save();
        notyf()->success('Lesson updated successfully.');
        return redirect()->back();
    }


    public function deleteLesson(Request $request){
       // dd($request->all());
       $lesson = CourseChapterLesson::where(['id' => $request->lesson_id, 'instructor_id' => Auth::user()->id])->first();
       $lesson->delete();
       return response(['status' => 'success', 'message' => 'Lesson deleted successfully.']);
    }


    public function editChapter(Request $request){
           $editMode = true;
           $course = Course::findOrFail($request->course_id);
           $chapter = CourseChapter::where(['id' => $request->chapter_id, 'instructor_id' => Auth::user()->id])->first();
           return view('instructor.course.partials.course-content-add-chapter', compact('course', 'chapter', 'editMode'))->render();
    }


    public function updateChapter(Request $request){
        //dd($request->all());
        $request->validate([
            'title' => ['required', 'string'],
        ]);

        $chapter = CourseChapter::where(['id' => $request->chapter_id, 'instructor_id' => Auth::user()->id])->first();
        $chapter->title = $request->title;
        $chapter->save();
        notyf()->success('Chapter updated successfully.');
        return redirect()->back();
    }



    public function deleteChapter(Request $request){
        $chapter = CourseChapter::where(['id' => $request->chapter_id, 'instructor_id' => Auth::user()->id])->first();
        $lessons = $chapter->lessons;
        foreach ($lessons as $lesson) {
            $lesson->delete();
        }
        $chapter->delete();
        notyf()->success('Chapter deleted successfully.');
        return response(['status' => 'success', 'message' => 'Chapter deleted successfully.']);
    }
}

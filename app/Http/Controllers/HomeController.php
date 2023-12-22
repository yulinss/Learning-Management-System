<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $purchased_courses = [];
        if (auth()->check()) {
            $purchased_courses = Course::whereHas('students', function($query) {
                $query->where('users.id', auth()->id());
            })
            ->with('lessons')
            ->orderBy('id', 'desc')
            ->get();
        }

        $courses =  Course::where('published', 1)->latest()->get();

        return view('index', compact('courses','purchased_courses'));
    }

    public function showCourse(){
        $course = Course::where('slug', $course_slug)->with('publishedLessons')->firstOrFail();
        $purchased_course = auth()->check() && $course->students()->where('user_id', auth()->id())->count() > 0;
       
        return view('admin.courses.create', compact('course', 'purchased_course'));
    }
    
    public function storeCourse(Request $request){
        $data = $request->all();
        $data['course_image'] = $request->file('course_image')->store(
            'images/courses', 'public'
        );
        $course = Course::create($data);
        $teachers = auth()->user()->isAdmin() ? array_filter((array)$request->input('teachers')) : [auth()->id()];
        $course->teachers()->sync($teachers);

        return redirect()->route('partial.index');
    }
}

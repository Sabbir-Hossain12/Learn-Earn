<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\TeacherRegister;
use App\Models\User;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function teachersPage()
    {
        $teachers= User::role('teacher')->where('status',1)->get();

        return view('Frontend.pages.teacher.teachers',compact('teachers'));
    }

    public function teachersDetails(string $slug)
    {

      $teacher=  User::where('slug', $slug)->firstOrFail();

      $relatedCourses= Course::where('teacher_id', $teacher->id)->where('status',1)->limit(4)->get();
      return view('Frontend.pages.teacher.teacher-details',compact('teacher','relatedCourses'));

    }

    public function registerAsTeacher(Request $request)
    {
//        dd($request->all());
        $request->validate([
            'name' => 'required|string',
            'email' =>  'required|string|email|unique:teacher_registers,email',
            'phone' => 'required|string',
            'address' => 'nullable|string',
            'info'  => 'nullable|string'
        ]);

        TeacherRegister::create($request->except('_token'));

        return redirect()
            ->to(url()->previous() . '#teacher-registration-section')
            ->with('success','Your Registration is Pending. We will contact you soon');
    }
}

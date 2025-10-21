<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Basicinfo;
use App\Models\Course;
use App\Models\CourseClass;
use App\Models\Enrollment;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->hasRole('admin')) {
            $total_classes =CourseClass::count();
            $total_courses = Course::count();
            $total_students = User::role('student')->count();
            $total_enrollments = Enrollment::count();

            return view('backend.pages.dashboard.dashboard',compact('total_classes','total_courses','total_students','total_enrollments'));
        }
        else
        {
            $teacher = auth()->user();

            $total_courses = Course::where('teacher_id', $teacher->id)->count();

            $total_lessons = Lesson::whereHas('course', function ($query) use ($teacher) {
                $query->where('teacher_id', $teacher->id);
            })->count();

            $total_enrollments = Enrollment::whereHas('course', function ($query) use ($teacher) {
                $query->where('teacher_id', $teacher->id);
            })->count();

            $total_earnings = Enrollment::join('courses', 'enrollments.course_id', '=', 'courses.id')
                ->where('courses.teacher_id', $teacher->id)
                ->sum('courses.sale_price');

            $account_balance = $teacher->account_balance;

            $teacher_agreement = Basicinfo::value('teacher_agreement');
        }

        return view('backend.pages.dashboard.dashboard',
            compact('total_courses',
        'total_lessons','total_enrollments','total_earnings','teacher_agreement','account_balance'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

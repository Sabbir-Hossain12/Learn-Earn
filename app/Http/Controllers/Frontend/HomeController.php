<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Blog;
use App\Models\Course;
use App\Models\CourseClass;
use App\Models\Herobanner;
use App\Models\Page;
use App\Models\Testimonial;
use App\Models\TestimonialSetting;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function homePage(Request $request)
    {

        $heroBanner= Herobanner::first();
        $services = CourseClass::where('status',1)->where('is_featured',1)->orderBy('position','asc')->get();
        $about= About::first();
        $testimonials= Testimonial::where('status',1)->get();
        $testimonialSetting= TestimonialSetting::first();
        $featuredCourses= Course::with('class','teacher')->where('status',1)->where('is_featured',1)->get();
        $teachers= User::role('teacher')->where('status',1)->get();
        $blogs= Blog::where('status',1)->limit(3)->get();

        $randomCourse= Course::where('status',1)->inRandomOrder()->limit(6)->get();
        $courseClasses= CourseClass::where('status',1)->where('is_featured',1)->orderBy('position','asc')->limit(4)->get();

        // get the full query string (since your code is not using key=value)
        $affiliateCode = $request->query('ref');

        if ($affiliateCode) {
            // Save in session
            session(['ref_code' => $affiliateCode]);
        }

        return view('Frontend.pages.home',compact(['heroBanner','randomCourse','courseClasses','teachers','about','services','testimonials','testimonialSetting','blogs','featuredCourses']));
    }


    public function page(string $slug)
    {
       $content= Page::where('slug', 'like' , '%'.$slug.'%')->orWhere('slug', $slug)->first();

       if ($content->slug == $slug) {
           return view('Frontend.pages.info.about-us',compact('content'));
       }

    }


    public function aiAssistant()
    {
        return view('Frontend.ai-assistant.index');
    }

    public function addToWish(Request $request)
    {
        if (!auth()->check() || !auth()->user()->hasRole('student')) {

            return response()->json([
                'status' => 'error',
                'action' => 'unauthorized',
                'message' => 'Login to Continue',
            ],401);
        }

        $user_id = Auth::user()->id;
        $course_id = $request->course_id;

        $exist = Wishlist::where('user_id', $user_id)->where('course_id', $course_id)->first();

        if ($exist) {
            $exist->delete();
            return response()->json([
                'status' => 'success',
                'action' => 'remove',
                'message' => 'Course removed from wishlist',
            ],200);
        }

        $wishlist = new Wishlist();
        $wishlist->user_id = $user_id;
        $wishlist->course_id = $course_id;
        $wishlist->save();

        return response()->json([
            'status' => 'success',
            'action' => 'add',
            'message' => 'Course added to wishlist',
        ],201);
    }
}

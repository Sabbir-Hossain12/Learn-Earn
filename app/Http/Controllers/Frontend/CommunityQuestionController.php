<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CommunityQuestion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CommunityQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions = CommunityQuestion::with('user')->latest()->get();
        return view('Frontend.pages.community.question', compact('questions'));
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
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $question = CommunityQuestion::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'content' => $request->content,
            'slug' => Str::slug($request->title . '-' . time())
        ]);

        // Optional: send notification to instructors
        $instructors = User::role(['teacher','admin'])->get();
        \Notification::send($instructors, new \App\Notifications\CommunityQuestion($question));

        // Return HTML for AJAX
        $html = view('Frontend.pages.community.question_card', compact('question'))->render();

        return response()->json(['status' => 'success', 'html' => $html]);
    }

    /**
     * Display the specified resource.
     */
    public function show(CommunityQuestion $communityQuestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CommunityQuestion $communityQuestion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CommunityQuestion $communityQuestion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CommunityQuestion $communityQuestion)
    {
        //
    }

    // Show a question with answers (AJAX)
    public function answers(Question $question)
    {
        $answers = $question->answers()->with('user')->latest()->get();
        $html = view('questions.partials.answers', compact('answers'))->render();
        return response()->json(['html' => $html]);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        return view('backend.pages.profile.index', compact('user'));
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
        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->instructor_title = $request->instructor_title;
        $user->long_desc = $request->long_desc;
        $user->payment_method = $request->payment_method;
        $user->payment_info = $request->payment_info;

        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $filename = time() . uniqid() .'.'. $file->getClientOriginalExtension();
            $file->move(public_path('backend/upload/profile/'), $filename);
            $user->profile_image = 'backend/upload/profile/' . $filename;
        }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

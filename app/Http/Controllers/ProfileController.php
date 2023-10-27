<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\Profile;

class ProfileController extends Controller
{
    /**
     *  $this->middleware('auth'); => gebruiker moet ingelogd zijn!
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profiles = Profile::all();
        return view('profiles.index', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProfileRequest $request)
    {

        $request->validate([
            'user_id' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'mobile' => 'required'
        ]);

        Profile::create($request->all());

        return redirect()->route('profiles.index')->with('succes', 'Profile created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        return view('profiles.show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {
        if ($profile->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('profiles.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profile $profile)
    {
        if ($profile->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'firstname' => 'required|string|255',
            'lastname' => 'required|string|255',
            'mobile' => 'required|string|15'
        ]);

        $profile->update($request->all());

        return redirect()->route('profiless.index')
            ->with('success', 'Profile updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        $profile->delete();

        return redirect()->route('profiles.index')
            ->with('success', 'Profile deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\PetUpdateRequest;
use App\Models\Pet;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('pets.index', [
            'pets' => Pet::with('user')->latest()->get(),
        ]);
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
    public function store(PetUpdateRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $request->user()->petProfiles()->create($validated);

        return redirect()->route('dashboard')->with('status', 'Pet profile created :)');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pet $petProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pet $petProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pet $petProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pet $petProfile)
    {
        //
    }
}

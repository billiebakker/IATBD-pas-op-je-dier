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
        $request->user()->pets()->create($validated);

        return redirect()->route('dashboard')->with('status', 'Pet profile created :)');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pet $pet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pet $pet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pet $pet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pet $pet): RedirectResponse
    {

//        $this->authorize('delete', $pet);
        $pet->delete();
        return redirect(route('pets.index'));
//        return redirect()->route('dashboard')->with('status', 'Pet profile created :)');
    }
}

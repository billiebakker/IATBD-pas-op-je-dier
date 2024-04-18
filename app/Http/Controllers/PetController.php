<?php

namespace App\Http\Controllers;

use App\Http\Requests\PetUpdateRequest;
use App\Models\Pet;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
//    public function allPets(): View
//    {
//        return view('pets.index', [
//            'pets' => Pet::with('user')->latest()->get(),
//        ]);
//    }

    public function myPets(): View
    {
        return view('pets.index', [
            'pets' => Auth::user()->pets()->latest()->get(),
        ]);
    }

    public function index(): View
    {
        return view('pets.index', [
            'pets' => Pet::with('user')
                ->where('user_id', '!=', Auth::id())
                ->where('advert_active', true)
                ->latest()->get(),
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
        $user = Auth::user();

        $validated = $request->validated();

        if (!$request->has('advert_active')) {
            $validated['advert_active'] = false;
        } else {
            $validated['advert_active'] = true;
        }

        if ($request->hasFile('picture')) {
            $path = $request->file('picture')->store('pets', 'public');
            $validated['picture'] = $path;
        }

        $user->pets()->create($validated);

        return redirect()->back()->with('status', 'Pet profile created :)');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pet $pet): View
    {
//        return $this->index();
//        return view('pets.show', [
//            'pet' => $pet,
//        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pet $pet): RedirectResponse|View
    {
        if ($pet->user->is(Auth::user())) {
            return view('pets.edit', [
                'pet' => $pet,
            ]);
        }

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pet $pet): RedirectResponse
    {
        $this->authorize('update', $pet);

        $pet->update($request->all());

        if ($request->hasFile('picture')) {
            $path = $request->file('picture')->store('pets', 'public');
            $pet->update([
                'picture' => $path,
            ]);
        }

        return redirect()->route('pets.index')->with('status', 'Pet profile updated :)');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pet $pet): RedirectResponse
    {
        $this->authorize('delete', $pet);
        $pet->delete();
        return redirect()->back()->with('status', 'Pet profile deleted :(');
    }

    public function respond(Pet $pet): View
    {
        return view('pets.respond', [
            'pet' => $pet,
        ]);
    }

}

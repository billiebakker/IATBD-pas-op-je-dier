<?php

namespace App\Http\Controllers;

use App\Http\Requests\PetsitterAdvertUpdateRequest;
use App\Models\PetsitterAdvert;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PetsitterAdvertController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('petsitter-adverts.index', [
            'petsitterAdverts' => PetsitterAdvert::latest()->get(),
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
    public function store(PetsitterAdvertUpdateRequest $request): RedirectResponse
    {
        $user = Auth::user();

        $validated = $request->validated();


        if (!$request->has('advert_active')) {
            $validated['advert_active'] = false;
        } else {
            $validated['advert_active'] = true;
        }

        if ($request->hasFile('picture')) {
            $validated['picture'] = $request->file('picture')->store('public');
        }

        if ($request->hasFile('house_pictures')) {
            $pictures = [];
            foreach ($request->file('house_pictures') as $pic) {
                $pictures[] = $pic->store('public');
            }
            $validated['house_pictures'] = $pictures;
        }

        $user->petsitterAdvert()->create($validated);

        return redirect()->route('petsitter-adverts.index')->with('success', 'Advert created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(PetsitterAdvert $petsitterAdvert): View
    {
        return view('petsitter-adverts.show', [
            'petsitterAdvert' => $petsitterAdvert,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PetsitterAdvert $petsitterAdvert)
    {
        return view('petsitter-adverts.edit', [
            'petsitterAdvert' => $petsitterAdvert,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PetsitterAdvert $petsitterAdvert)
    {
        $petsitterAdvert->update($request->all());

        if ($request->hasFile('picture')) {
            $path = $request->file('picture')->store('public');
            $petsitterAdvert->update([
                'picture' => $path,
            ]);
        }

        if ($request->hasFile('house_pictures')) {
            $pictures = [];
            foreach ($request->file('house_pictures') as $pic) {
                $pictures[] = $pic->store('public');
            }
            $petsitterAdvert->update([
                'house_pictures' => $pictures,
            ]);
        }

        return redirect()->route('petsitter-adverts.index')->with('success', 'Advert updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PetsitterAdvert $petsitterAdvert)
    {
        //
    }
}

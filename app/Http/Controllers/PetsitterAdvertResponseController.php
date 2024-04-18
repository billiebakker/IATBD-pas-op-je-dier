<?php

namespace App\Http\Controllers;

use App\Models\PetsitterAdvert;
use App\Models\PetsitterAdvertResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PetsitterAdvertResponseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $petsitterAdvertResponses = PetsitterAdvertResponse::where('target_user_id', $user->id)->get();

        return view('petsitter-advert-responses.index', [
            'petsitterAdvertResponses' => $petsitterAdvertResponses,
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
    public function store(Request $request): RedirectResponse
    {
        $user = Auth::user();
        $target_petsitter_advert = PetsitterAdvert::where('id', $request->petsitter_advert_id)->first();

        $user->petsitterAdvertResponses()->create([
            'message' => $request->message,
            'petsitter_advert_id' => $request->petsitter_advert_id,
            'target_user_id' => $target_petsitter_advert->user_id,
            'status' => 'pending',
        ]);

        return redirect()->route('petsitter-adverts.index')->with('success', 'Your response has been sent!');
    }

    /**
     * Display the specified resource.
     */
    public function show(PetsitterAdvertResponse $petsitterAdvertResponse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PetsitterAdvertResponse $petsitterAdvertResponse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PetsitterAdvertResponse $petsitterAdvertResponse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PetsitterAdvertResponse $petsitterAdvertResponse)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\AdvertResponse;
use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdvertResponseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $pets = Pet::with('user')->where('user_id', $user->id)->get();


        $advertResponses = AdvertResponse::with('pet')->where('user_id', $user->id)->get();

        return view('advert-responses.index', [
            'advertResponses' => $advertResponses,
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
    public function store(Request $request)
    {
        $user = Auth::user();
        $target_pet = Pet::where('id', $request->pet_id)->first();

        $user->advertResponses()->create([
            'message' => $request->message,
            'pet_id' => $request->pet_id,
            'target_user_id' => $target_pet->user_id,
            'status' => 'pending',
        ]);

        return redirect()->route('pets.index')->with('success', 'Your response has been sent!');
    }

    /**
     * Display the specified resource.
     */
    public function show(AdvertResponse $advertResponse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AdvertResponse $advertResponse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AdvertResponse $advertResponse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AdvertResponse $advertResponse)
    {
        //
    }
}

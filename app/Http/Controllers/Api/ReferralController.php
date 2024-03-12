<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Referral;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ReferralController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json(Referral::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): Response
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric', 'min:10'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'course' => ['nullable', 'string', 'max:255'],
        ]);

        $referrer_id = User::where('referral_token', $request->referral_token)->pluck('id')->first();

        Referral::create([
            'referrer_id' => $referrer_id,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'course' => $request->course,
        ]);

        return response('success', 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Referral $referral)
    {
        return response()->json($referral, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Referral $referral)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric', 'min:10'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'course' => ['nullable', 'string', 'max:255'],
        ]);

        $referral->update($validatedData);

        return response('success', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Referral $referral)
    {
        $referral->delete();

        return response('success', 200);
    }
}

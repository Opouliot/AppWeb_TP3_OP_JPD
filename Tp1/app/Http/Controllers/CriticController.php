<?php

namespace App\Http\Controllers;

use App\Models\Critic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Film;

class CriticController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //get all critics from user
        if(Auth::check()) {
            $critics = Auth::user()->critics;
            return response()->json($critics, 200);
        }
        return response()->json(['message' => 'Unauthorized'], 401);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //validate request
        $validator = Validator::make($request->all(), [
            'film_id' => 'required|integer',
            'score' => 'required|integer|min:0|max:10',
            'comment' => 'required|string'
        ]);

        if($validator->fails()) {
            return response()->json(['message' => 'Invalid request'], 400);
        }
        //check if film exists
        if(!Film::find($request->film_id)) {
            return response()->json(['message' => 'Film not found'], 404);
        }
        //check if user has already added a critic to film
        if(Auth::user()->critics->where('film_id', $request->film_id)->first()) {
            return response()->json(['message' => 'You have already added a critic to this film'], 400);
        }

        //add critic to film, check if user is logged in
        if(Auth::check()) {
            $critic = new Critic();
            $critic->user_id = Auth::user()->id;
            $critic->film_id = $request->film_id;
            $critic->score = $request->score;
            $critic->comment = $request->comment;
            $critic->save();
            return response()->json($critic, 201);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Critic $critic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Critic $critic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Critic $critic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Critic $critic)
    {
        //
    }
}

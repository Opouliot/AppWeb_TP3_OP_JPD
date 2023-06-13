<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actor;
use App\Http\Resources\ActorResource;
use Illuminate\Support\Facades\Validator;

class ActorController extends Controller
{
    public function index()
    {
        return ActorResource::collection(Actor::all());
    }

    public function show($id)
    {
        return new ActorResource(Actor::findOrFail($id));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'birthdate' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $actor = Actor::create($request->all());
        return new ActorResource($actor);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'birthdate' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $actor = Actor::findOrFail($id);
        $actor->update($request->all());
        return new ActorResource($actor);
    }

    public function destroy($id)
    {
        $actor = Actor::findOrFail($id);
        $actor->delete();
        return response()->json(null, 204);
    }

    public function search($name)
    {
        return ActorResource::collection(Actor::where('first_name', 'like', "%$name%")->get());
    }
}

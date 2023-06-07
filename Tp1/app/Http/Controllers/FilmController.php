<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Http\Resources\FilmResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Resources\ActorResource;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //if request does not have any query parameter
        if(!$request->has('keywords') && !$request->has('rating') && !$request->has('max-length')) {
            return FilmResource::collection(Film::paginate(20));
        }
        //if request doesnt have keywords, change it for %
        if(!$request->has('keywords')) {
            $request->query->set('keywords', '%');
        }
        //if request doesnt have rating, change it for %
        if(!$request->has('rating')) {
            $request->query->set('rating', '%');
        }
        //if request doesnt have max-length, change it for 100000
        if(!$request->has('max-length')) {
            $request->query->set('max-length', 100000);
        }
        
        // join all above
        if($request->has('keywords') && $request->has('rating') && $request->has('max-length')) {
            $keywords = $request->query('keywords');
            $rating = $request->query('rating');
            $max_length = $request->query('max-length');
            $films = Film::where(function(Builder $query) use ($keywords){
                $query->where('title', 'like', "%$keywords%")
                    ->orWhere('description', 'like', "%$keywords%");
            })
            ->where('rating', 'like', "$rating")
            ->where('length', '<=', $max_length)
            ->paginate(20);

            if(!$films) {
                return response()->json(['message' => 'No films found'], 404);
            }
            return FilmResource::collection($films);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'release_year' => 'required|date',
            'language_id' => 'required|integer',
            'length' => 'required|integer',
            'rating' => 'required|string|max:255',
            'special_features' => 'required|string|max:255',
            'image' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $film = Film::create($request->all());
        return new FilmResource($film);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new FilmResource(Film::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Film $film)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'release_year' => 'required|date',
            'language_id' => 'required|integer',
            'length' => 'required|integer',
            'rating' => 'required|string|max:255',
            'special_features' => 'required|string|max:255',
            'image' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $film->update($request->all());
        return new FilmResource($film);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $film = Film::find($id);
        $film->delete();
        return response()->json(null, 204);
    }

    public function actors(int $id)
    {
        $film = Film::find($id);
        if(!$film) {
            return response()->json(['message' => 'No film found'], 404);
        }
        return ActorResource::collection($film->actors);
    }
    /*
    public function destroy(Film $film)
    {
        $film->delete();
        return response()->json(null, 204);
    }
    */
}

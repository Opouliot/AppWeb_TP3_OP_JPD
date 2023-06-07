<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FilmResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'release_year' => $this->release_year,
            'language_id' => $this->language_id,
            'length' => $this->length,
            'rating' => $this->rating,
            'special_features' => $this->special_features,
            'image' => $this->image,
        ];
    }
}

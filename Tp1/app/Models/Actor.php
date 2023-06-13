<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;
    //fillables
    protected $fillable = ['first_name', 'last_name', 'birthdate'];

    //belongs to many Film
    public function films()
    {
        return $this->belongsToMany(Film::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Amenity extends Model
{
    public function studySpots() { return $this->belongsToMany(StudySpot::class); }
}

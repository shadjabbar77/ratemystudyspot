<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    protected $fillable = ['name', 'city'];

    public function studySpots()
    {
        return $this->hasMany(StudySpot::class);
    }
}

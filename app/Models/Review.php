<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

protected $fillable = [
    'study_spot_id',
    'user_id',
    'rating',
    'text',
];

public function studySpot()
{
    return $this->belongsTo(\App\Models\StudySpot::class);
}

public function user()
{
    return $this->belongsTo(\App\Models\User::class);
}

public function comments() { return $this->hasMany(Comment::class); }
public function votes() { return $this->hasMany(Vote::class); }



}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudySpot extends Model
{
    protected $fillable = [
        'user_id',
        'campus_id',
        'building',
        'floor',
        'room_area_name',
        'metaphone',
'image_path',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function campus()
    {
        return $this->belongsTo(Campus::class);
    }

    public function reviews()
    {
        return $this->hasMany(\App\Models\Review::class);
    }

    public function amenities()
    {
        return $this->belongsToMany(Amenity::class);
    }


}

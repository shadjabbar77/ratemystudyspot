<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
   // app/Models/Course.php
protected static function booted()
{
    static::saving(function ($course) {
        $text = trim(($course->code ?? '') . ' ' . ($course->name ?? ''));
        $course->metaphone = $text ? metaphone($text) : null;
    });
}

}

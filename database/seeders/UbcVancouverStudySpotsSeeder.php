<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\StudySpot;

class UbcVancouverStudySpotsSeeder extends Seeder
{

public function run(): void
{
    $buildings = [
        'IKB',
        'Koerner Library',
        'UBC Life Building',
        'AMS Student Nest',
       
    ];

    foreach ($buildings as $b) {
        StudySpot::firstOrCreate(['building' => $b]);
    }
}



}

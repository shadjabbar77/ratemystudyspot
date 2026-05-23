<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductionStudySpotSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        foreach (array (
  0 => 
  array (
    'id' => 1,
    'name' => 'UBC Vancouver',
    'city' => 'Vancouver',
    'created_at' => '2026-03-04 09:43:30',
    'updated_at' => '2026-03-04 09:43:30',
  ),
) as $row) {
            DB::table('campuses')->updateOrInsert(['id' => $row['id']], $row);
        }

        foreach (array (
  0 => 
  array (
    'id' => 3,
    'user_id' => NULL,
    'campus_id' => 1,
    'building' => 'Irving K. Barber Learning Centre (IKB)',
    'floor' => NULL,
    'room_area_name' => NULL,
    'metaphone' => 'IRFNKKBRBRLRNNKSNTRKB',
    'image_path' => 'study-spot-images/Irving K. Barber Learning Centre (IKB).jpg',
    'created_at' => '2026-04-23 17:46:45',
    'updated_at' => '2026-05-20 15:23:24',
  ),
  1 => 
  array (
    'id' => 4,
    'user_id' => NULL,
    'campus_id' => 1,
    'building' => 'Walter C. Koerner Library',
    'floor' => NULL,
    'room_area_name' => NULL,
    'metaphone' => 'WLTRKKRNRLBRR',
    'image_path' => 'study-spot-images/Walter C. Koerner Library.jpg',
    'created_at' => '2026-04-23 17:46:45',
    'updated_at' => '2026-05-20 15:23:24',
  ),
  2 => 
  array (
    'id' => 5,
    'user_id' => NULL,
    'campus_id' => 1,
    'building' => 'AMS Student Nest',
    'floor' => NULL,
    'room_area_name' => NULL,
    'metaphone' => 'AMSSTTNTNST',
    'image_path' => 'study-spot-images/AMS Student Nest.jpg',
    'created_at' => '2026-04-23 17:46:45',
    'updated_at' => '2026-05-20 15:23:24',
  ),
  3 => 
  array (
    'id' => 6,
    'user_id' => NULL,
    'campus_id' => 1,
    'building' => 'Buchanan Block A Building',
    'floor' => NULL,
    'room_area_name' => NULL,
    'metaphone' => 'BXNNBLKBLTNK',
    'image_path' => 'study-spot-images/Buchanan Block A Building.jpg',
    'created_at' => '2026-04-23 17:46:45',
    'updated_at' => '2026-05-20 15:23:24',
  ),
  4 => 
  array (
    'id' => 7,
    'user_id' => NULL,
    'campus_id' => 1,
    'building' => 'Buchanan Block B Building',
    'floor' => NULL,
    'room_area_name' => NULL,
    'metaphone' => 'BXNNBLKBBLTNK',
    'image_path' => 'study-spot-images/Buchanan Block B Building.jpg',
    'created_at' => '2026-04-23 17:46:45',
    'updated_at' => '2026-05-20 15:23:24',
  ),
  5 => 
  array (
    'id' => 9,
    'user_id' => NULL,
    'campus_id' => 1,
    'building' => 'Buchanan Block D Building',
    'floor' => NULL,
    'room_area_name' => NULL,
    'metaphone' => 'BXNNBLKTBLTNK',
    'image_path' => 'study-spot-images/Buchanan Block D Building.jpg',
    'created_at' => '2026-04-23 17:46:45',
    'updated_at' => '2026-05-20 15:23:24',
  ),
  6 => 
  array (
    'id' => 10,
    'user_id' => NULL,
    'campus_id' => 1,
    'building' => 'P. A. Woodward Instructional Resources Centre (IRC)',
    'floor' => NULL,
    'room_area_name' => NULL,
    'metaphone' => 'PWTWRTNSTRKXNLRSRSSSNTRRK',
    'image_path' => 'study-spot-images/P. A. Woodward Instructional Resources Centre (IRC).jpg',
    'created_at' => '2026-04-23 17:46:45',
    'updated_at' => '2026-05-20 15:23:24',
  ),
  7 => 
  array (
    'id' => 11,
    'user_id' => NULL,
    'campus_id' => 1,
    'building' => 'ICICS/CS Building (ICCS)',
    'floor' => NULL,
    'room_area_name' => NULL,
    'metaphone' => 'ISKSKSBLTNKKKS',
    'image_path' => 'study-spot-images/icics.jpg',
    'created_at' => '2026-04-23 17:46:45',
    'updated_at' => '2026-05-20 15:23:24',
  ),
  8 => 
  array (
    'id' => 12,
    'user_id' => NULL,
    'campus_id' => 1,
    'building' => 'Fred Kaiser Building',
    'floor' => NULL,
    'room_area_name' => NULL,
    'metaphone' => 'FRTKSRBLTNK',
    'image_path' => 'study-spot-images/Fred Kaiser Building.jpg',
    'created_at' => '2026-04-23 17:46:45',
    'updated_at' => '2026-05-20 15:23:24',
  ),
  9 => 
  array (
    'id' => 13,
    'user_id' => NULL,
    'campus_id' => 1,
    'building' => 'Buchanan Block C Building',
    'floor' => NULL,
    'room_area_name' => NULL,
    'metaphone' => 'BXNNBLKKBLTNK',
    'image_path' => 'study-spot-images/Buchanan Block C Building.jpg',
    'created_at' => '2026-04-23 17:46:45',
    'updated_at' => '2026-05-20 15:23:24',
  ),
  10 => 
  array (
    'id' => 15,
    'user_id' => NULL,
    'campus_id' => 1,
    'building' => 'Woodward Library',
    'floor' => NULL,
    'room_area_name' => NULL,
    'metaphone' => 'WTWRTLBRR',
    'image_path' => 'study-spot-images/Woodward Library.jpg',
    'created_at' => '2026-04-23 17:46:45',
    'updated_at' => '2026-05-20 15:23:24',
  ),
  11 => 
  array (
    'id' => 16,
    'user_id' => NULL,
    'campus_id' => 1,
    'building' => 'UBC Life Building',
    'floor' => NULL,
    'room_area_name' => NULL,
    'metaphone' => 'UBKLFBLTNK',
    'image_path' => 'study-spot-images/UBC Life Building.jpg',
    'created_at' => '2026-04-23 17:46:45',
    'updated_at' => '2026-05-20 15:23:24',
  ),
  12 => 
  array (
    'id' => 17,
    'user_id' => NULL,
    'campus_id' => 1,
    'building' => 'Earth Sciences Building',
    'floor' => NULL,
    'room_area_name' => NULL,
    'metaphone' => 'ER0SNSSBLTNK',
    'image_path' => 'study-spot-images/Earth Sciences Building.jpg',
    'created_at' => '2026-04-23 17:46:45',
    'updated_at' => '2026-05-20 15:23:24',
  ),
) as $row) {
            DB::table('study_spots')->updateOrInsert(['id' => $row['id']], $row);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('study_spots', function (Blueprint $table) {
    $table->id();

    $table->foreignId('campus_id')->constrained()->cascadeOnDelete();

    $table->string('building')->index();
    $table->string('floor');
    $table->string('room_area_name');

    $table->string('metaphone')->nullable()->index();

    $table->timestamps();

    $table->unique(['campus_id', 'building', 'floor', 'room_area_name']);
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('study_spots');
    }
};

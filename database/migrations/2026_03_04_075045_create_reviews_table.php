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
    Schema::create('reviews', function (Blueprint $table) {
    $table->id();

    $table->foreignId('study_spot_id')->constrained()->cascadeOnDelete();
    $table->foreignId('user_id')->constrained()->cascadeOnDelete();

    $table->tinyInteger('rating'); // 1-5
    $table->tinyInteger('noise')->nullable(); // 1-5
    $table->tinyInteger('crowdedness')->nullable(); // 1-5
    $table->boolean('outlets')->nullable();
    $table->tinyInteger('wifi_quality')->nullable(); // 1-5
    $table->tinyInteger('seating')->nullable(); // 1-5
    $table->string('best_time')->nullable();
    $table->text('text')->nullable();

    $table->timestamps();

    $table->index(['study_spot_id', 'created_at']);
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};

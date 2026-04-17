<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('car_specs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id')->constrained()->cascadeOnDelete();
            $table->foreignId('power_unit_id')->constrained()->cascadeOnDelete();
            $table->year('season');
            $table->string('chassis');
            $table->unsignedSmallInteger('weight_kg');
            $table->string('front_suspension');
            $table->string('rear_suspension');
            $table->string('car_image')->nullable()->default('placeholder.jpg');

            $table->timestamps();

            //per evitare di avere più auto nella stessa season
            $table->unique(['team_id', 'season']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_specs');
    }
};

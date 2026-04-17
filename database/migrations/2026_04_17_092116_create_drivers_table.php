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
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id')->constrained()->cascadeOnDelete(); //quando elimino un team vengono eliminati tutti i piloti
            $table->string('first_name');
            $table->string('last_name');
            $table->string('nationality');
            $table->year('season');
            $table->unsignedSmallInteger('driver_number');
            $table->string('photo');
            $table->date('date_of_birth');
            $table->text('biography');
            $table->text('driver_slogan');
            $table->unsignedInteger('total_pole_positions')->default(0);
            $table->unsignedInteger('total_wins')->default(0);
            $table->unsignedInteger('total_podiums')->default(0);
            $table->unsignedInteger('total_world_championships')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drivers');
    }
};

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
        Schema::table('teams', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('name');
        });

        DB::table('teams')->orderBy('id')->chunk(100, function ($teams) {
            foreach ($teams as $team) {
                $baseSlug = Str::slug($team->name);
                $slug = $baseSlug;
                $counter = 1;

                while (
                    DB::table('teams')
                        ->where('slug', $slug)
                        ->where('id', '!=', $team->id)
                        ->exists()
                ) {
                    $slug = $baseSlug . '-' . $counter;
                    $counter++;
                }

                DB::table('teams')
                    ->where('id', $team->id)
                    ->update(['slug' => $slug]);
            }
        });

        Schema::table('teams', function (Blueprint $table) {
            $table->unique('slug');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('teams', function (Blueprint $table) {
            $table->dropUnique(['slug']);
            $table->dropColumn('slug');
        });
    }
};

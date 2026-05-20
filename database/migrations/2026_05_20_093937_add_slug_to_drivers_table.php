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
        Schema::table('drivers', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('last_name');
        });

        DB::table('drivers')->orderBy('id')->chunk(100, function ($drivers) {
            foreach ($drivers as $driver) {
                $baseSlug = Str::slug($driver->first_name . ' ' . $driver->last_name);
                $slug = $baseSlug;
                $counter = 1;

                while (
                    DB::table('drivers')
                        ->where('slug', $slug)
                        ->where('id', '!=', $driver->id)
                        ->exists()
                ) {
                    $slug = $baseSlug . '-' . $counter;
                    $counter++;
                }

                DB::table('drivers')
                    ->where('id', $driver->id)
                    ->update(['slug' => $slug]);
            }
        });

        Schema::table('drivers', function (Blueprint $table) {
            $table->unique('slug');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('drivers', function (Blueprint $table) {
            $table->dropUnique(['slug']);
            $table->dropColumn('slug');
        });
    }
};

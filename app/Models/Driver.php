<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

class Driver extends Model
{
    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    protected static function booted(): void
    {
        static::creating(function ($driver) {
            $driver->slug = static::generateUniqueSlug($driver->first_name, $driver->last_name);
        });
    }

    private static function generateUniqueSlug(string $first_name, string $last_name): string
    {
        $baseSlug = Str::slug(trim($first_name . ' ' . $last_name));
        $slug = $baseSlug;
        $counter = 1;

        while (static::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }
}

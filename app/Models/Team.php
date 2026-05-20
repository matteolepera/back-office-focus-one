<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

class Team extends Model
{
    public function drivers()
    {
        return $this->hasMany(Driver::class);
    }
    public function carSpecs()
    {
        return $this->hasOne(CarSpec::class);
    }

    protected static function booted(): void
    {
        static::creating(function ($team) {
            $team->slug = static::generateUniqueSlug($team->name);
        });
    }

    private static function generateUniqueSlug(string $name): string
    {
        $baseSlug = Str::slug($name);
        $slug = $baseSlug;
        $counter = 1;

        while (static::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }
}

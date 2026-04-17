<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PowerUnit extends Model
{
    public function carSpecs()
    {
        return $this->hasMany(CarSpec::class);
    }
}

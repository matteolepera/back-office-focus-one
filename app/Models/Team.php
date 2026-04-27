<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}

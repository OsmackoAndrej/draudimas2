<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    public function owner()
    {
        return $this->belongsTo(Owner::class);

    }
    public function setRegNumber($value): void
    {
        $this->attributes['reg_number'] = strtoupper($value);
    }
    public function photos()
    {
        return $this->hasMany(CarPhoto::class);
    }

}

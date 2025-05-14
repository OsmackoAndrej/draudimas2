<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'cars';
    public function owner()
    {
        return $this->belongsTo(Owner::class, 'owner_id');

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

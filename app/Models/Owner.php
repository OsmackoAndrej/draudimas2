<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    protected $table = 'owners';
    protected $fillable = ['name', 'surname', 'email', 'phone', 'address'];
    public function cars()
    {
        return $this->hasMany(Car::class, 'owner_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modelis extends Model
{
    public function Brand()
    {
        return $this->belongsTo(Brand::class);

    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = [
        'name',
        'company_name',
        'operating_hour',
        'jakim_ref_no',
        'expiry_year',
        'category_id',
    ];
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function locations()
    {
        return $this->hasMany(Location::class);
    }

    public function getHalalStatusAttribute()
    {
        return $this->expiry_year >= now()->year
            ? 'Active'
            : 'Expired';
    }
}

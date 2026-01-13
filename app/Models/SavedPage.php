<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SavedPage extends Model
{
    protected $fillable = ['page_name', 'page_url'];
}

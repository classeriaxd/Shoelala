<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shoe extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'id');
    }
    
    public function shoeImages()
    {
        return $this->hasMany(ShoeImage::class, 'shoe_id');
    }
}

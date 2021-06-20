<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shoe extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];
    protected $table = 'shoes';
    protected $primaryKey = 'shoe_id';


    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }
    
    public function shoeImages()
    {
        return $this->hasMany(ShoeImage::class, 'shoe_id');
    }
}

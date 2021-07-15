<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShoeImage extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $guarded = [];
    protected $table = 'shoe_images';
    public $timestamps = false;

    public function shoe()
    {
        return $this->belongsTo(Shoe::class, 'shoe_id');
    }

    public function imageangle()
    {
        return $this->belongsTo(ImageAngle::class, 'image_angle_id');
    }
}

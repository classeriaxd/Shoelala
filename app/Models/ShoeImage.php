<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoeImage extends Model
{
    use HasFactory;
    
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

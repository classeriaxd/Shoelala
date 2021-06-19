<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageAngle extends Model
{
    use HasFactory;
    
    protected $guarded = [];
    protected $table = 'image_angles';
    public $timestamps = false;
    protected $primaryKey = 'image_angle_id';


    public function shoeimages()
    {
        return $this->hasMany(ShoeImage::class, 'image_angle_id');
    }
}

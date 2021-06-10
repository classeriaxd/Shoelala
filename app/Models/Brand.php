<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;
    
    public function shoes()
    {
        return $this->hasMany(Shoe::class, 'brand');
    }
}

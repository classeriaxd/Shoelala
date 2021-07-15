<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $guarded = [];
    protected $table = 'brands';
    public $timestamps = false;
    protected $primaryKey = 'brand_id';


    public function shoes()
    {
        return $this->hasMany(Shoe::class, 'brand_id');
    }
}

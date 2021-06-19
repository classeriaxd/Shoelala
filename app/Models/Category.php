<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    protected $guarded = [];
    protected $table = 'categories';
    public $timestamps = false;
    protected $primaryKey = 'category_id';


    public function shoes()
    {
        return $this->hasMany(Shoe::class, 'category_id');
    }
}

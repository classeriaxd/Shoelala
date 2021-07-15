<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Size extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'sizes';
    public $timestamps = false;
    protected $primaryKey = 'size_id';

    public function shoe()
    {
        return $this->belongsTo(Shoe::class, 'shoe_id');
    }
    public function stocks()
    {
        return $this->hasMany(Stock::class, 'size_id');
    }
}

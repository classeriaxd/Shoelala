<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stock extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];
    protected $table = 'stocks';
    protected $primaryKey = 'stock_id';
    protected $fillable = ['stocks'];

    public function shoe()
    {
        return $this->belongsTo(Shoe::class, 'shoe_id');
    }
    public function size()
    {
        return $this->belongsTo(Size::class, 'size_id');
    }
}

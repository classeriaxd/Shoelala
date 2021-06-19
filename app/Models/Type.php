<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'types';
    public $timestamps = false;
    protected $primaryKey = 'type_id';


    public function shoes()
    {
        return $this->hasMany(Shoe::class, 'type_id');
    }
}

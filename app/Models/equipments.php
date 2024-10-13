<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class equipments extends Model
{
    use HasFactory;

    protected $fillable = [
        'equipment_name',
        'room_id',
        'status',
        'description'
    ];
    public function room()
    {
        return $this->belongsTo(Rooms::class,'room_id');
    }
}

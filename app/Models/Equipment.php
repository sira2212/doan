<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;
    protected $table = 'equipments';

    protected $fillable = [
        'name',
        'type',
        'room_id', // Foreign key
        'status', // active or inactive
    ];

    public function room()
    {
        return $this->belongsTo(Rooms::class);
    }
}

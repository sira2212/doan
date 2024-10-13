<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeRoom extends Model
{
    use HasFactory;

    protected $table = 'type_rooms';

    protected $fillable = [
        'type_name',
        'description',
        'created_at',
        'updated_at',
    ];

    public function rooms()
    {
        return $this->hasMany(Rooms::class, 'type_room_id');
    }
}

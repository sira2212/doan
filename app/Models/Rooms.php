<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    use HasFactory;
    protected $table = "rooms";
    protected $fillable = [
        'room_name',
        'room_type',
        'capacity',
        'status',
        'description',
        'created_at',
        'updated_at',
    ];
    public function equipments()
    {
        return $this->hasMany(Equipment::class);
    }

    public function roomBookings()
    {
        return $this->hasMany(RoomBooking::class);
    }
    public function typeRoom()
    {
        return $this->belongsTo(TypeRoom::class, 'type_room_id');
    }
}

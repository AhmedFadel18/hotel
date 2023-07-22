<?php

namespace App\Models;

use App\Models\RoomType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    use HasFactory;
    // protected $table='rooms';
    protected $fillable=[
        'title','room_type_id'
    ];

    public function RoomType(){
        return $this->belongsTo(RoomType::class);
    }
}

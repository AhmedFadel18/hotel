<?php

namespace App\Models;

use App\Models\Room;
use App\Models\RoomTypeImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RoomType extends Model
{
    use HasFactory;

    public function rooms(){
        return $this->hasMany(Room::class,);
    }

    public function roomtypeimages(){
        return $this->hasMany(RoomTypeImage::class);
    }
}

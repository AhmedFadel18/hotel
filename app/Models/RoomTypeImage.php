<?php

namespace App\Models;

use App\Models\RoomType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RoomTypeImage extends Model
{
    use HasFactory;
    public function roomtype(){
        return $this->belongsTo(RoomType::class);
    }
}

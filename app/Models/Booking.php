<?php

namespace App\Models;

use App\Models\Room;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;

    public function room(){
        return $this->belongsTo(Room::class);
    }

    public function customer(){
        return $this->belongsTo(Customer::class);
    }
}

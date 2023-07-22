<?php

namespace App\Models;

use App\Models\Department;
use App\Models\StaffSalary;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Staff extends Model
{
    use HasFactory;
    public function department(){
        return $this->belongsTo(Department::class);
    }
    public function salary_payment(){
        return $this->hasMany(StaffSalary::class);
    }
}

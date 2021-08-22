<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }

    public function parents()
    {
        return $this->hasMany(StudentParent::class);
    }
}

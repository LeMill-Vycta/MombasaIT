<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Appointment;


class Time extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function appointment(){
        return $this->belongsTo(Appointment::class,'appointment_id','id');
    }
}

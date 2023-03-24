<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Appointment;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'image',
        'average_price',
        'option_1',
        'option_2',
        'option_3'

    ];  
    public function appointment()
    {
        return $this->hasOne(Appointment::class,'id','services_id');
    }
}

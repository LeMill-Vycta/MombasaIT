<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function staff()
    {
        return $this->belongsTo(User::class,'staff_id','id');
    }
     public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function service()
    {
        return $this->belongsTo(Service::class,'service','name');
    }
    public function booking()
    {
        return $this->belongsTo(Booking::class,'booking_id','id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Service;


class Booking extends Model
{
    use HasFactory;
    protected $guarded =[];

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
        return $this->belongsTo(Service::class,'services_id','id');
    }
    
}

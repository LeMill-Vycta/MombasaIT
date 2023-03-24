<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Service;

class Appointment extends Model
{
    use HasFactory;
    protected $guarded = [];
    

    public function staff(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function service(){
        return $this->belongsTo(Service::class,'services_id');
    }

    public function getId(){
        return $this->id;
    }

    public function isAllDay(){
        return (bool)$this->all_day;
    }

    public function getTitle(){
        return $this->service()->name;
    }


}

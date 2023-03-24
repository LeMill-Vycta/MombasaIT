<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'department',
        'education',
        'description',
        'address',
        'phone_number',
        'image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    /* This adds user model class event to role_id with 
    default value 3 if not set  
    protected static function boot()
{
    parent::boot();

    static::creating(function ($model) {
        if (!$model->role_id) {
            $model->role_id = 3;
        }
    });
    } */
    public function role(){
    return $this->hasOne('App\Models\Role','id','role_id');
   }
   
   public function userAvatar($request){
    $image = $request->file('image');
    $name = $image->hashName();
    $destination = public_path('/images');
    $image->move($destination,$name);
    return $name;

   }
   /*public function setPasswordAttribute($password)
{
    $this->attributes['password'] = Hash::make($password);
}*/
}


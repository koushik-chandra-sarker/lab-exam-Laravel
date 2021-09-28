<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    use HasFactory;
    protected $fillable = ['first_name', "last_name", "email", "gender", 'password'];

    public function roles(){
        return $this->belongsToMany(Role::class)->withTimestamps();
    }
    public function country(){
        return $this->hasOne(Country::class);
    }
    public function city(){
        return $this->hasOne(City::class);
    }
}

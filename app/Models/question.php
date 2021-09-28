<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    use HasFactory;

    protected $fillable = ['question', "active"];

    public function question_type(){
        return $this->belongsTo(QuestionType::class);
    }
    public function answers(){
        return $this->hasMany(answer::class);
    }
    public function country(){
        return $this->belongsTo(Country::class);
    }
    public function city(){
        return $this->belongsTo(City::class);
    }
}

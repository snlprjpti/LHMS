<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=[
        'employer_id','food_id','date','delivery'
    ];

    protected $table='orders';

    public function foods(){
        return $this->hasMany('App\Food');
    }
    public function employees(){
        return $this->hasMany('App\Employee');
    }
}

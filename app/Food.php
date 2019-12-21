<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $fillable=[
        'category_id','name','description','price','allow_today'
    ];

    protected $table='foods';

    public function category(){
        return $this->belongsTo('App\Category','category_id','id');
    }

    public static function getFoodname($id)
    {
        return Food::find($id);
    }
}

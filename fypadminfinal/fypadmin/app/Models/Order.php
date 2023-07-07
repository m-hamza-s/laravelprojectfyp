<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Order extends Model
{
    use HasFactory;
    protected $table='orders';

    public function getCreatedAtAttribute($date){
    
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d/m/Y');
    }

    public function user(){
        return $this->belongsTo(\App\Models\Frontuser::class);
    }
    public function cart(){
        return $this->hasMany(\App\Models\Cart::class);
    }
}

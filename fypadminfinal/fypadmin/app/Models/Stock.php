<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $table='stock';

    public static function totalStock(){
        $total = 0;
            $all = self::get();
        foreach ($all as $item){
            if ($item->type == 2){
                $total -= $item->quantity;
            }else{
                $total += $item->quantity;
            }
        }
        return $total;
    }
}

<?php

namespace App\Models;
use App\Models\Stock;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function stock(){
        return $this->hasMany(\App\Models\Stock::class);
    }

    public function getproductStockAttribute()
    {
        $stock = $this->stock;
           
        $total = 0;
        foreach ($stock as $item){
            if ($item->type == 1){
                $total += $item->quantity;
            }else{
                $total -= $item->quantity;
            }
        }
        return $total;
    }
}

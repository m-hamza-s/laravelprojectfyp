<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Stock;
use App\Models\Product;

class VoyagerStockController extends VoyagerBaseController
{
    public function index(\Illuminate\Http\Request $request)
    {
        $products = Product::orderBy("id", "DESC")->paginate('15');
        return view('vendor.voyager.stocks.browse', compact('products'));
    }

    public function create(\Illuminate\Http\Request $request)
    {
        return view('vendor.voyager.stocks.edit-add');
    }
    public function store(\Illuminate\Http\Request $request)
    {
        $request->validate([
            'product' => 'required',
            'quantity' => 'required',
        ]);
        $stock = new Stock;
        $stock->product_id = $request->product;
        $stock->quantity = $request->quantity;
        $stock->type = "1";
        $stock->save();
        return redirect('/inventory');
    }
}

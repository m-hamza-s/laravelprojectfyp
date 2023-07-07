<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Product;


class VoyagerOrdersController extends VoyagerBaseController
{
    public function index(\Illuminate\Http\Request $request){
        $orders=Order::orderBy("id","DESC")->paginate('15');
         return view('vendor.voyager.orders.browse',compact('orders'));
        
    }
    public function show(\Illuminate\Http\Request $request,$id){
        $orders=Order::find($id);
        return view('vendor.voyager.orders.read',compact('orders'));
    }
    public function status($id,$status){
        $order = Order::find($id);
        $order->status=$status;
        $order->save();
        return redirect()->route('voyager.orders.index');
    }

    public function getProducts(\Illuminate\Http\Request $request){
        $search = $request->search;
    
        if ($search == '') {
            $products = Product::orderby('name', 'asc')->selectRaw('id, name as title, name')->limit(5)->get();
        } else {
            $products = Product::orderby('name', 'asc')
                ->selectRaw('id, name as title, name')
                ->where('name', 'like', '%' . $search . '%')
                ->limit(5)->get();
        }
    
        $response = array();
        foreach ($products as $product) {
            $response[] = array(
                "id" => $product->id,
                "text" => $product->title
            );
        }
    
        echo json_encode($response);
        exit;
    }
    
}

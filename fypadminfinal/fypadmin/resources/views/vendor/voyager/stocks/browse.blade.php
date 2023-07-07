@extends('voyager::master')

@section('content')

<?php
use App\Helper\UtilsHelper;
?>
<link rel="stylesheet" href="{{asset('fontawesome\css\all.min.css')}}">

<style>
    .bg-green{
        background: green;
        color: white;
        margin-top: 5px !important;
        margin-bottom: 5px !important;
    }
    .bg-yellow{
        background: yellow;
        color: black;
        margin-top: 5px;
        margin-bottom: 5px;
    }
    .bg-red{
        background: red;
        color: white;
        margin-top: 5px;
        margin-bottom: 5px;
    }
</style>

<div class="card" style="overflow: visible;">
   <div class="card-header"><h3 class="card-title">Available Stock</h3>
    <a href="/inventory/create" class="btn btn-primary " style="position:absolute; right:10px; top:30px;
    ">Edit Stock</a>
    </div>
    <div class="card-body">
      Total Products:{{App\Models\Stock::totalStock()}}
        <table class="table table-bordered">
            <thead>
                <th>
                    Product
                </th>
                <th>
                    Balance
                </th>
               
            </thead>
            <tbody>
                @foreach ($products as $item)
                    
               
                <tr class="@if($item->productStock>10) bg-green
                    @elseif($item->productStock<10&&$item->productStock>0) bg-yellow
                    @else($item->productStock<=0) bg-red
                    @endif">

                    <td>
                        {{$item->name}}
                    </td>
                    <td>

                        {{$item->productStock}}
                    </td>
                    
                </tr>
                @endforeach
            </tbody>
           
        </table>
    </div>
    <div class="card-footer">
        {!!$products->links()!!}
    </div>
  </div>




@endsection
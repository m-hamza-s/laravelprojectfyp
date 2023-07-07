@extends('voyager::master')

@section('content')
<div class="card">
    <div class="card-header"><h3 class="card-title">Orders Table For Admin</h3></div>
     <div class="card-body">

<table class="table table-bordered">
    <thead>
        <tr>
            <th>SL No.</th>
            <th>Product Name</th>
            <th>Quantity</th>

            <th>Price</th>
            <th>total Price</th>
        </tr>
    </thead>
        
    <tbody>

        <?php $sum=0;?>
        @foreach ($orders->cart as $item)
            
        
        <tr>
            <td>
                {{$loop->iteration}}
                </td>
        <td>
            {{$item->product->name}}
        </td>
            <td>
                <div>
                    {{$item->quantity}}
                </div>
            </td>
        
        <td>
                {{$item->price}}
                <?php $sum+=$item->price;?>
        </td>
        <td>
            {{$item->price*$item->quantity}}
        </td>
           
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="2"><b>Total</td>
            {{-- <td>{{Cart::getTotalQuantity()}}</td> --}}
            <td></td>
            
            <td>{{$orders->total}}</td>
        </tr>
    </tfoot>

</table>
     </div>
     
    </div>

@endsection
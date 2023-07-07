
@extends('voyager::master')

@section('content')
<?php
use App\Helper\UtilsHelper;
?>
<link rel="stylesheet" href="{{asset('fontawesome\css\all.min.css')}}">


<div class="card" style="overflow: visible;">
   <div class="card-header"><h3 class="card-title">Orders Table For Admin</h3></div>
    <div class="card-body">
      
        <table class="table table-bordered">
            <thead>
                <th>
                    Order Id
                </th>
                <th>
                    Date
                </th>
                <th>
                    User
                </th>
                <th>
                    Products
                </th>
                <th>
                    Total
                </th>
                <th>
                    Status
                </th>
                <th>
                    Action
                </th>
            </thead>
            <tbody>
                @foreach ($orders as $item)
                    
               
                <tr>
                    <td>
                        {{$item->id}}
                    </td>
                    <td>
                        {{$item->created_at}}
                    </td>
                    <td>
                        {{optional($item->user)->name}}
                    </td>
                    <td>
                        @foreach ($item->cart as $x)
                            {{optional($x->product)->name}}
                        @endforeach
                    </td>
                    <td>
                            {{$item->total}}
                    </td>
                    <td>
                       
                        <div class="dropup">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Status
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <li><a class="dropdown-item" href="{{url('/ordersstatus/'.$item->id.'/1')}}">Pending</a></li>
                             <li><a class="dropdown-item" href="{{url('/ordersstatus/'.$item->id.'/2')}}">Approved</a></li>
                            <li><a class="dropdown-item" href="{{url('/ordersstatus/'.$item->id.'/3')}}">Dispatched</a></li>
                        <li><a class="dropdown-item" href="{{url('/ordersstatus/'.$item->id.'/4')}}">Delivered</a></li>
                    <li><a class="dropdown-item" href="{{url('/ordersstatus/'.$item->id.'/5')}}">Cancelled</a></li>
                    </ul>
                </div>
                        
                        {!!UtilsHelper::status($item->status)!!}
                    
                        
                    </td>
                    <td>
                        <a href="/orders/{{$item->id}}" class="btn btn-xs btn-primary">
                            <i class="fa fa-eye"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td>
                
                    </td>
            </tr>
            </tfoot>
        </table>
    </div>
    <div class="card-footer">
        {!!$orders->links()!!}
    </div>
  </div>



@endsection
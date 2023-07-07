@extends('voyager::master')

@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('select2\css\select2.min.css')}}">

<style>
    .select2 .select2-container{
    width:100%
} 
select2, .select2-selection__rendered, .select2-selection{
    width: 100% !important;
}

 .select2, .select2-selection__rendered, .select2-selection{
    height: 36px !important;
    line-height: 36px !important;
    width: 100% !important;
}


.select2-results__options {
    height: 250px;
    overflow-y: auto;
}

</style>

<div class="card">
    <div class="card-header"><h3 class="card-title">Admin Add Stock</h3></div>
     <div class="card-body">
       <form action="/inventory/store" method="post">
           @csrf
           <div class="form-group">
           <label for="">Select Products</label>
        <select name="product" id="selectProduct" class="custom-select"></select>
    </div>
    <div class="form-group">
        <label for="">Quantity</label>
     <input  type="number" name="quantity" id="selectProduct" class="form-control">
 </div>
 <button type="submit" class="btn btn-primary ">Save</button>
 
    
       </form>
         
     </div>
     <div class="card-footer">
        
     </div>
   </div>

@endsection
@section('javascript')
<script src="{{asset('select2/js/select2.min.js')}}"></script>

<script>
    
$(document).ready(function () {

    $("#selectProduct").select2({
        allowClear: true,
        placeholder: "Select Product",
        ajax: {
            url: "{{url('/getProducts')}}",
            type: "get",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                
                    search: params.term // search term
                };
            },
            processResults: function (response) {
                return {
                    results: response
                };
            },
            success: function (data) {
                if (data.length == 0) {
                    $('#errorMsg').modal('show');
                }
            },
            
              templateResult: function(data) {
            return data.text;
              },
              templateSelection: function(data) {
            return data.text;
              },
            cache: true
        }
    })
      
  
    });

</script>

@endsection
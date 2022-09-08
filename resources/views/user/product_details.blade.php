@extends('layouts.app')
@section('content')


@include('admin.sidebar');
<div id="content-wrapper" class="d-flex flex-column">

  <div id="content">
    
    <div class="row-lg-8 mx-auto">
        <ul class="list-group shadow">
            <li class="list-group-item">
                <!-- Custom content-->
                <div class="media align-items-lg-center flex-column flex-lg-row p-3" style="margin:auto;width:50%;padding:20px">
                    <div class="media-body order-2 order-lg-1">
                        <h5 class="mt-0 font-weight-bold mb-2">Title:{{$product->product_name}}</h5>
                        <div class="d-flex align-items-center justify-content-between mt-1">
                            <h6 class="font-weight-bold my-2">Discription:{{$product->discription}}</h6>
                        </div>  
                            <div class="d-flex align-items-center justify-content-between mt-1">
                            @if($product->price!=null)
                            <h6 class="font-weight-bold my-2">Price:{{$product->price}}</h6>
                            
                            @endif  
          
                        </div> 
                        <div class="d-flex align-items-center justify-content-between mt-1">
                            <h6 class="font-weight-bold my-2">Type:{{$product->type}}</h6>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mt-1">
                            <h6 class="font-weight-bold my-2">Stock:{{$product->stock}}</h6>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mt-1">
                            <h6 class="font-weight-bold my-2">Weight:{{$product->weight}}</h6>
                        </div>
                           <div class='img-box'>
                      <img src="/product/{{$product->image}}" alt="image" width="20" class="ml-lg-5 order-1 order-lg-2"> 
                    </div>

                </div>
                </div>
                        
            </li> 

        </ul>    
    </div>
    
  </div>
</div>   



@endsection
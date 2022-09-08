
@extends('layouts.app')
@section('content')

<style type='text/css'>
    .photo{
        margin-bottom: 20px;
    }
</style>

<div class="container-fluid">

    <!-- Page Heading -->
    
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>
     

    <!-- Content Row -->
    <div class="col">
       @foreach($product as $products)
        <!-- Earnings (Monthly) Card Example -->
        
        <div id="SlidesOnly" class="carousel slide photo" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
            <img class='d-block w-50' src="/product/{{$products->image}}" alt="image" width="100%" class="ml-lg-5 order-1 order-lg-2">
        </div>
    </div>
</div>



        <div class="row-lg-8 mx-auto">
            <ul class="list-group shadow">
                <li class="list-group-item">
                    <!-- Custom content-->

                   


                    
                    <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                        <div class="media-body order-2 order-lg-1">
                            <h5 class="mt-0 font-weight-bold mb-2">{{$products->product_name}}</h5>
                            <div class="d-flex align-items-center justify-content-between mt-1">
                                <h6 class="font-weight-bold my-2">{{$products->discription}}</h6>
                            </div>  
                                <div class="d-flex align-items-center justify-content-between mt-1">
                                @if($products->price!=null)
                                <h6 class="font-weight-bold my-2">{{$products->price}}</h6>
                                
                                @endif  
              
                            </div> 
                            <div class="d-flex align-items-center justify-content-between mt-1">
                                <h6 class="font-weight-bold my-2">{{$products->type}}</h6>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-1">
                                <h6 class="font-weight-bold my-2">{{$products->stock}}</h6>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-1">
                                <h6 class="font-weight-bold my-2">{{$products->weight}}</h6>
                            </div>
                            <div class="options">
                                <a href="{{url('product_details', $products->id)}}" class='option1'>Details</a>
                            </div>
                        </div>  
                    </div>
                            
                </li> 

            </ul>    
        </div>
       
        @endforeach
        {!!$product->withQueryString()->links('pagination::bootstrap-4')!!}
</div>
</div>




@endsection


   
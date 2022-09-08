@extends('layouts.app')
@section('content')
    


         

<style type='text/css'>
 
  .center{
    margin:auto;
    margin-top:40px;
    text-align:center;
  }
  .font_size{
        font-size:40px;
        padding-top:40px;
        text-align: center;
    }
    .img_size{
        width:100px;
        height:100px;
    }
    .th_color{
        color:skyblue;
    }


 </style>   



    <!-- Sidebar -->
    @include('admin.topbar');
   @include('admin.sidebar');
    
   
        
    
    <div id="content-wrapper" class="d-flex flex-column">
      
      @if (session()->has('message'))
    <div class='alert alert-success'>
       <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>x</button> 
       

        {{session()->get('message')}}
    </div>
     @endif



      <h2 class='font_size'>All Products</h2>
      <table class="table table-borderless center">
        <tr class='th_color'>
            <th scope="col">Image</th>
            <th scope="col">Product_name</th>
            <th scope="col">Discription</th>
            <th scope="col">Price</th>
            <th scope="col">Type</th>
            <th scope="col">Stock</th>
            <th scope="col">Weight</th>
           
            
            
            <th scope="col">Delete</th>
            <th scope="col">Edit</th>
        </tr> 
        @foreach($product as $product)
         <tr>
            <td scope="col">
                <img class='img_size' src="/product/{{$product->image}}">
            </td> 
           <td scope="col">{{$product->product_name}}</td> 
           <td scope="col">{{$product->discription}}</td> 
           <td scope="col">$ {{$product->price}}</td> 
           <td scope="col">{{$product->type}}</td> 
           <td scope="col">{{$product->stock}}</td> 
           <td scope="col">{{$product->weight}}</td> 
           <td scope="col">
            <td><a  onclick="return confirm('Are you sure to delete!')" class= ' btn btn-danger' href='{{url('delete_product', $product->id)}}'>Delete</a></td>
            <td><a type="button" class="btn btn-info" href='{{url('update_product', $product->id)}}'>Edit</a></td>
        </td>
           
           
        </tr>  
        @endforeach
      </table> 
    </div>
    <!-- End of Content Wrapper -->






@endsection    
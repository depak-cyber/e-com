@extends('layouts.app')
@section('content')
<style type='text/css'>
    .div_center
    {
       text-align:center;
       padding-top:40px; 
    }
    .font_size{
        font-size:40px;
        padding-top:40px;
    }
    .text_color{
        color:black;
        padding-bottom:4px;
    }
      label{
        display:inline-block;
        width:200px;
      }  
      .div_design{
        padding-bottom:2px;
      }
    
    </style>
  <!-- Page Wrapper -->
  

    <!-- Sidebar -->
    
    @include('admin.topbar');
    @include('admin.sidebar');
    
    <div id="content-wrapper" class="d-flex flex-column">
      
      <div id="content">
        
        @if (session()->has('message'))
        <div class='alert alert-success'>
           <button type='button' class='close' data-dismissible='alert' aria-hidden='true'>x</button> 
           

            {{session()->get('message')}}
        </div>

        @endif
     
     <div class='div_center'>   
     <h2 class='font_size'>Add Product</h2>
      
     <form action="{{url('/update_product_confirm',$product->id)}}" method='POST' enctype='multipart/form-data'>
       @csrf
        <div class='div_design'>
         <label>Product Name</label>
         <input type='text' class='text_color' name='title' placeholder='write a title' required='' value="{{$product->product_name}}">
       </div>
       
       <div class='div_design'>
        <label>Discription</label>
        <input type='text' class='text_color' name='discription' placeholder='write a title' required='' value="{{$discription->discription}}">
      </div>   
           

      <div class='div_design'>
        <label>Price</label>
        <input type='number' min='0' class='text_color' name='price' placeholder='write a price' value="{{$product->price}}" >
      </div>

      <div class='div_design'>
        <label for='' >Type</label>
        <input type="radio" name="type"  placeholder='write a stock' required='' value="{{$product->type}}"> Top saller
        <input  type="radio" name="type"  placeholder='write a stock' required='' value="{{$product->type}}"> Featured
         
    
      </div>


      <div class='div_design'>
        <label>Weight</label>
        <input type='number' class='text_color' name='weight' placeholder='write a revenew' required='' value="{{$product->weight}}" >
      </div>

      <div class='div_design'>
        <label for=''>Stock</label>
        <input type='radio' class='text_color' name='stock' placeholder='write a stock' required='' value="{{$product->stock}}" >Yes
        <input type='radio' class='text_color' name='stock' placeholder='write a stock' required='' value="{{$product->stock}}" >No
      </div>

      

      <div class='div_design'>
        <label> Current product image</label>
        <input type='file'  name='image' >
      </div>

      <div class='div_design'>
        <label>Product image</label>
        <img  height='100' width='100'src="/product/{{$product->image}}">
      </div>
      <div class='div_design' >
        
        <input type='submit'  value='Edit Product' class='btn btn-primary' >
      </div>

    </form>

     </div>
    </div>
    
    <!-- End of Content Wrapper -->

</div>

<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->

@include('admin.logout');


@endsection
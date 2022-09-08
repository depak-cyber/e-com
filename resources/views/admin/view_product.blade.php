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
      
     <form action='{{url('/add_product')}}' method='POST' enctype='multipart/form-data'>
       @csrf
        <div class='div_design'>
         <label>Product Name</label>
         <input type='text' class='text_color' name='title' placeholder='write a title' required='' >
       </div>
       
       <div class='div_design'>
        <label>Description</label>
        <input type='text' class='text_color' name='discription' placeholder='write a title' required='' >
        
      </div>

      <div class='div_design'>
        <label>Price</label>
        <input type='number' min='0' class='text_color' name='price' placeholder='write a price'  >
      </div>

      <div class='div_design'>
        <label>Stock</label>
        <input type='radio' class='text_color' name='stock' placeholder='write a revenew' required='' value='yes'  >Yes
        <input type='radio' class='text_color' name='stock' placeholder='write a revenew' required='' value='no' >No
      </div>

      <div class='div_design'>
        <label>Type</label>
        <input type='radio' class='text_color' name='type' placeholder='write a type' required='' value='top seller'  >Top Seller
        <input type='radio' class='text_color' name='type' placeholder='write a type' required='' value='featured' >Featured
      </div>
      

      <div class='div_design'>
        <label>Weight(kg)</label>
        <input type='number' class='text_color' name='weight' placeholder='write a weight' required=''  >
        
      </div>

      <div class='div_design'>
        <label>Product image</label>
        <input type='file'  name='image' >
      </div>
      <div class='div_design' >
        
        <input type='submit'  value='Add Product' class='btn btn-primary' >
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
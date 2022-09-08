@extends('layouts.app')
@section('content')
   
<style type='text/css'>
    .div_center
    {
       text-align:center;
       padding-top:40px; 
    }
    .h2_font 
    {
        font-size:40px;
    }
    .input_color{
        color:black;
    }
    .center{
        margin:auto;
        width:50%;
        text-align:center;
        margin-top: 30px;
        border: 3px solid black;
    }
    .h3_font{
        direction: rtl;
        margin:auto;
        

    }
  

</style>
@include('admin.topbar');
@include('admin.sidebar');
<div id="content-wrapper" class="d-flex flex-column">
    
    <!-- Main Content -->
    <div id="content">
        
           

              
        @if (session()->has('message'))
        <div class='alert alert-success'>
           <button type='button' class='close' data-dismissible='alert' aria-hidden='true'>x</button> 
           

            {{session()->get('message')}}
        </div>

        @endif
   <div class='div_center'>
      <h2 class='h2_font'>Add catagory</h1>
      
       <form action='{{url('/add_catagory')}}'method='POST' >
           @csrf
           
           <input  class ='input_color' type='text' name='catagory' placeholder='write category name'>
           <input type='submit' class='btn btn-primary h3_font' name='submit' value='Add category'>

           

       </form>
   </div>
     
   <table class='center'>
           
       <tr>
         <td> Catagory</td>
         <td>Action</td>
         
       </tr>
     @foreach($data as $data)
       <tr>
         <td> {{$data->catagory_name}}</td>
         <td>
             <a  onclick="return confirm('Are you sure to delete!')" class= ' btn btn-danger' href='{{url('delete_catagory', $data->id)}}'>Delete</a>
         </td>
         
       </tr>
       @endforeach
  </table> 
     
</div>
</div>
     

            

    

 @endsection
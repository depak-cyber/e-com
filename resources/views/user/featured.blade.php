
<div  class='py-5'>
   <div class='container'>
       <div class='row '>
         @foreach($featured as $product)
           <div class='col-md-5 product_data'>
               <div class='card'>
                 
                   <img src="/product/{{$product->image}}" alt='Product_image' class='Product_image'>
                   <div class='card-body'>
                     <input type='hidden' value="{{$product->id}}" class='prod_id'>
                       <h2>Featured</h2><hr>
                       <h5>{{$product->product_name}}</h5>
                       <h5>{{$product->price}}</h5>
                       
 
                   </div>   
               </div>
           </div>
           
           @endforeach
       </div>
 
 
   </div>
   
    
       
     
     
 </div>
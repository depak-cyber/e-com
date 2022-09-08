<style>

  .Product_image{
    height:100px;
    width:50px;
  }
</style>
<div  class='py-5'>
  <div class='container'>
      <div class='row '>
        @foreach($products as $product)
          <div class='col-md-5 product_data'>
              <div class='card'>
                
                  <img src="/product/{{$product->image}}" alt='Product_image' class='Product_image'>
                  <div class='card-body'>
                    <input type='hidden' value="{{$product->id}}" class='products_id'>
                      <h2>Top Seller</h2><hr>
                      <h5>{{$product->product_name}}</h5>
                      <h5>{{$product->price}}</h5>
                      <button class='btn btn-success me-3 addToFav float-start'><i class='fa fa-heart'></i></button>

                  </div>   
              </div>
          </div>
          
          @endforeach
      </div>
      <script>
        $(document).ready(function (){
        $('.addToFav').click(function(e) {
              e.preventDefault();

            var product_id=$(this).closest('.product_data').find('.products_id').val();

            $.ajaxSetup({
            headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
          });
              

            $.ajax({
            method:'POST',
            url:'/add-to-cart',
            data:{
              'product_id': product_id,
            },
            
            success: function(response){
              alert(response.status);

            }
           })
        })
        })
       </script> 


  </div>

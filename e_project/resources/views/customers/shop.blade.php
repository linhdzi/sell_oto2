@extends ('layouts.app')

@section ('content')

<link rel="stylesheet" href="../../css/style.css">
<link rel="stylesheet" href="../../css/shop.css">
        <div class="container">
            <div class="d-flex">
                <div class="left-side-title">
                    
                </div>
                <div class="middle-title">
                    
                </div>
                <div class="right-side-title">
                    <a href="javascript:void(0)">Home</a>
                    <span>></span>
                    <a href="javascript:void(0)">Shop</a>
                </div>
            </div>
            <div class="main">
                <div class="row gy-3 row g-1 ">
                    @foreach($products as $p)    
                        <div class="col-md-3">
                            <div class="card">
                                <a href="/customers/detail/{{$p -> id}}"><img src="{{$p -> pic}}" class="card-img-top" alt="..."></a>
                                <div class="card-body">
                                    <h5 class="card-title">{{$p ->name}}</h5>
                                    
                                    <p class="card-text">{{$p -> price}}$</p>
                                 
                                
                                  <!-- <button product_id="{{$p->id}}" type="button" onclick="addProduct({{$p->id}})" class="btn btn-light">Compare</button>
                                     -->
                                  
                                    
                                    
                                    
                                    <form action="{{ route('customers.compare') }}" class="tm-edit-product-form" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                  
                  
                    <input hidden
                      id="name"
                      name="name"
                      type="text"
                      class="form-control validate"
                      value="{{$p -> price}}"
                      required
                    />
                 
                  
                  
             
                <button type="submit" class="btn btn-primary btn-block text-uppercase">Compare</button>
              
                 
                  
            
              
              
            </form>


                                    
                                    <a href="/customers/Addcart/{{$p -> id}}">
                                    <button class="addtocart">
                                        <div class="pretext">
                                            <i class="fas fa-cart-plus"></i> ADD TO CART
                                        </div>
                                    </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
            </div>
        </div>    
   
     
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <!-- <script src="../../js/custom.js"></script> -->

@endsection
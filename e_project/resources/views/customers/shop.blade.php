@extends ('layouts.app')

@section ('content')

<link rel="stylesheet" href="../../css/style.css">
<link rel="stylesheet" href="../../css/shop.css">
@if(session('success'))
    <script>alert('{{ session('success') }}');</script>
@endif

@if(session('error'))
    <script>alert('{{ session('error') }}');</script>
@endif
        <div class="container">
            <div class="d-flex">
                <div class="left-side-title">
                    <h4>Shop full width</h4>
                </div>
                <div class="middle-title">
                    <h1>Shop in style</h1>
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
                                <img src="{{$p -> pic}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{$p ->name}}</h5>
                                    <div class="star">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                    <p class="card-text">{{$p -> price}}</p>
                                    <a href="/customers/detail/{{$p -> id}}" class="btn btn-light">View More</a>
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

@endsection
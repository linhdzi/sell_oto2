@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="../../css/style.css">
<link rel="stylesheet" href="../../css/detail.css">

<div class="container">
        <div class="row">
            @foreach($products as $p)
                <div class=" col-md-8">
                    <img id="img-chi-tiet" src="{{$p -> pic}}">
                </div>
                <div class=" col-md-4">
                    <div class="title-product">
                        <h2>{{$p -> name}}</h3>
                    </div>
                    <div class="introduce-product">
                        <p>{{$p -> description}}
                        </p>
                    </div>
                    <div>
                        <a href="/customers/Addcart/{{$p ->id}}">
                            <button>
                                <i class="fa-solid fa-cart-shopping"></i>
                                <span>ADD TO CART</span>
                            </button>
                        </a>
                    </div>
                    <div class="statistics">
                        <div class="as">
                            <span>Up to</span>
                            <span id="text-statis"> {{$p -> price}} </span>
                            <span>Money</span>
                        </div>
                        <div class="as">
                            <span>Up to</span>
                            <span id="text-statis"> 99K </span>
                            <span>Members</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
    

    
</body>

</html>
@extends ('layouts.app')

@section ('content')
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../css/index.css">    
<div class="slides">
    <div class="slide slide-1">
        <img src="../img/car1.png" class="silde_image">
    </div>
    <div class="slide slide-2">
        <img src="../img/car2.png" class="silde_image">
    </div>
    <div class="slide slide-3">
        <img src="../img/car3.png" class="silde_image">
    </div>
    <div class="slide slide-4">
        <img src="../img/car4.png" class="silde_image">
    </div>
</div>
<!-- end slide show -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="title">
                <h1>Our brand we provide</h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="row text-center icon">
                <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="check-icon">
                        <a href="#">
                            <img src="../img/client_01.jpg">
                        </a>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="check-icon">
                        <a href="#">
                            <img src="../img/client_02.jpg">
                        </a>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="check-icon">
                        <a href="#">
                            <img src="../img/client_03.jpg">
                        </a>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="check-icon">
                        <a href="#">
                            <img src="../img/client_04.jpg">
                        </a>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="check-icon">
                        <a href="#">
                            <img src="../img/client_05.jpg">
                        </a>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="check-icon">
                        <a href="#">
                            <img src="../img/client_06.jpg">
                        </a>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="check-icon">
                        <a href="#">
                            <img src="../img/client_07.jpg">
                        </a>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="check-icon">
                        <a href="#">
                            <img src="../img/client_08.jpg">
                        </a>
                    </div>
                </div>
                <!-- end col -->
            </div><!-- end row -->
        </div>
       
    </div>
</div><!-- end -->

<div class="container">
    <div class="row second-title">
        <div class="col-md-12">
            <div class="title">
                <h1>Popular Used Cars</h1>
            </div>
        </div>
    </div>
    <div class="row ">
        @foreach($index_products as $p)
        <div class="col-md-3 col-sm-6 col-xs-12 ">
            <div class="car-wrapper clearfix">
                <div class="post-media entry">
                    <figure class="card">
                        <img src="{{$p -> pic}}" alt="" class="card__image" />
                        <figcaption class="card__body">
                            <p class="card__description">
                                <span><i class="fa fa-money-check-dollar"></i> {{$p -> price}}</span>
                                <span><i class="fa fa-road"></i> {{$p -> horse_power}}</span>
                            </p>
                        </figcaption>
                    </figure>
                    <div class="car-title clearfix">
                        <h5><a href="/customers/index/{{$p -> id}}">{{$p -> name}}</a></h5>
                    </div><!-- end car-title -->
                    <button class="addtocart">
                        <div class="pretext">
                            <i class="fas fa-cart-plus"></i> ADD TO CART
                        </div>
                    </button>
                </div><!-- end post-media -->
            </div><!-- end clearfix -->
        </div><!-- end col -->
        @endforeach
    </div>
    
</div><!-- end -->

@endsection
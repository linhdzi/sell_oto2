@extends ('layouts.app')

@section ('content')

<link rel="stylesheet" href="../../css/shop.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    
    <link rel="stylesheet" href="../css/compare.css">
    <!-- Modernizr JS -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>


<body>


      

       
      
        <!-- Compare Page Start -->
        <div class="page-section section pt-90 pt-lg-70 pt-md-60 pt-sm-50 pt-xs-40   pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <form action="#">
                            <!-- Compare Table -->
                              
                            <div class="compare-table table-responsive">
                                <table class="table mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="first-column">Product</td>
                                            
                                               @foreach($products as $p)   
                                               <td class="product-image-title">
                                                <a href="#" class="image"><img src="{{$p -> pic}}" alt="Compare Product"></a>
                                                
                                                <a href="#" class="title">{{$p ->name}}</a>

                                            </td>
                                                @endforeach
                                        </tr>
                                        <tr>
                                            <td class="first-column">Description</td>
                                            
                                            @foreach($products as $p)   
                                            <td class="pro-desc">
                                                <p>{{$p -> description}}</p>
                                            </td>
                           @endforeach
                                        </tr>
                                        <tr>
                                            <td class="first-column">Price</td>
                                           
                                            @foreach($products as $p)   
                                            <td class="pro-price">{{$p -> price}}$</td>
                           @endforeach
                                           
                                        </tr>
                                        <tr>
                                        <td class="first-column">protection</td>
<?php foreach($products as $p): ?>
    <td>
        <div class="progress">
            <?php
                $protection = $p->protection;
                $progressWidth = ($protection / 1000) * 100;
                $progressClass = $protection > 1000 ? 'progress-bar-danger' : '';
            ?>
            <div class="progress-bar <?php echo $progressClass; ?>" role="progressbar" style="width: <?php echo $progressWidth; ?>%;" aria-valuenow="<?php echo $protection; ?>" aria-valuemin="0" aria-valuemax="1000"></div>
        </div>
    </td>
<?php endforeach; ?>
</tr>
                                        <tr>
                                        <tr>
    <td class="first-column">horse_power</td>
    <?php foreach($products as $p): ?>
        <td>
            <div class="progress">
                <?php
                    $horsePower = $p->horse_power;
                    $progressWidth = ($horsePower / 2000) * 100;
                    $progressClass = $horsePower > 2000 ? 'progress-bar-danger' : '';
                ?>
                <div class="progress-bar <?php echo $progressClass; ?>" role="progressbar" style="width: <?php echo $progressWidth; ?>%;" aria-valuenow="<?php echo $horsePower; ?>" aria-valuemin="0" aria-valuemax="1000"></div>
            </div>
        </td>
    <?php endforeach; ?>
</tr>

<tr>
                                            <td class="first-column">Rating</td>
                                            
                                            @foreach($products as $p)
                                            <td class="pro-ratting">
                                            @for ($i = 0; $i < $p->rating; $i++)
            <i class="fas fa-star"></i>
        @endfor
                                            </td>
    @endforeach
                                        </tr>
                                        <tr>
                                            <td class="first-column">Add to cart</td>
                                             @foreach($products as $p)   
                                             <td class="pro-addtocart"><a href="/customers/Addcart/{{$p -> id}}" class="add-to-cart" tabindex="0"><span>ADD TO CART</span></a></td>
                                           
                           @endforeach
                                        </tr>
                                        <tr>
                                            <td class="first-column">Delete</td>
                                           
                                            @foreach($products as $p)   
                                             <td class="pro-addtocart"><a href="#" class="add-to-cart" tabindex="0"><span>Delete</span></a></td>
                                           
                           @endforeach
                                           
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </form>
                       
                    </div>
                </div>
            </div>
        </div>
        <!-- Compare Page End -->
      

    <!-- Placed js at the end of the document so the pages load faster -->

    <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="https://maps.google.com/maps/api/js?sensor=false&amp;libraries=geometry&amp;v=3.22&amp;key=AIzaSyDAq7MrCR1A2qIShmjbtLHSKjcEIEBEEwM"></script>
    <script src="assets/js/vendor/bootstrap.min.js"></script>
    <script src="assets/js/plugins/plugins.js"></script>
    <script src="assets/js/main.js"></script>

</body>



@endsection
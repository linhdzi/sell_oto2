@extends ('layouts.app')

@section ('content')
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../css/cart.css">
<link rel="stylesheet" href="../../css/cart.css">
<link rel="stylesheet" href="../../css/style.css">
<main role="main">
        <!-- Block content - Đục lỗ trên giao diện bố cục chung, đặt tên là `content` -->
        <div class="container mt-4">
            <div id="thongbao" class="alert alert-danger d-none face" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>

            <h1 class="text-center">Giỏ hàng</h1>
            <div class="row">
                <div class="col col-md-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Ảnh đại diện</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Đơn giá</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody id="datarow">
                            @foreach($results as $r)
                                <tr>
                                    <td>{{$number++}}</td>
                                    <td>
                                        <img src="{{$r -> pic}}" class="hinhdaidien">
                                    </td>
                                    <td>{{$r -> name}}</td>
                                    <td class="text-right">{{$r -> quantity}}</td>
    
                                    <td class="text-right">{{$r -> totalprice}}</td>
                                    
                                    <td>
                                        <!-- Nút xóa, bấm vào sẽ xóa thông tin dựa vào khóa chính `sp_ma` -->
                                        <a id="delete_1" data-sp-ma="2" class="btn btn-danger btn-delete-sanpham" href="/customers/Deletecard/{{$r ->id}}">
                                            <i class="fa fa-trash" aria-hidden="true"></i> Xóa
                                        </a>
                                    </td>        
                                </tr>
                            @endforeach    
                            
                        </tbody>
                    </table>

                    <a href="../index" class="btn btn-warning btn-md"><i class="fa fa-arrow-left"
                            aria-hidden="true"></i>&nbsp;Quay
                        về trang chủ</a>
                    <a href="checkout.html" class="btn btn-primary btn-md"><i
                            class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;Thanh toán</a>
                </div>
            </div>
        </div>
        <!-- End block content -->
    </main>
       
@endsection
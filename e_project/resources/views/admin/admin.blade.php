<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Product Page - Admin HTML Template</title>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:400,700"
    />
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="../../css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="../../css/templatemo-style.css">
    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
  </head>

  <body id="reportsPage">
    <nav class="navbar navbar-expand-xl">
      <div class="container h-100">
        <a class="navbar-brand" href="index.html">
          <h1 class="tm-site-title mb-0">Product Admin</h1>
        </a>
        <button
          class="navbar-toggler ml-auto mr-0"
          type="button"
          data-toggle="collapse"
          data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <i class="fas fa-bars tm-nav-icon"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto h-100">
            
            <li class="nav-item">
              <a class="nav-link active" href="admin">
                <i class="fas fa-shopping-cart"></i> Products
              </a>
            </li>

            
            
          </ul>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link d-block" href="login.html">
                Admin, <b>Logout</b>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container mt-5">
      <div class="row tm-content-row">
        <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 tm-block-col">
          <div class="tm-bg-primary-dark tm-block tm-block-products">
            <div class="tm-product-table-container">
              <table class="table table-hover tm-table-small tm-product-table">
                <thead>
                  
                   
                  
                    
                    
                  
                </thead>
                <tbody>
                @foreach ($products as $p)
<tr>
    <th scope="row"><input type="checkbox" /></th>
    <td class="tm-product-name">{{ $p->name }}</td>
    <td>{{ $p->price }}</td>
  
    <td>{{ $p->created_at }}</td>
    
    <td>
    <form action="{{ route('admin.deletepd', ['id' => $p->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" style="background: none; border: none; padding: 0; cursor: pointer;">
                <i class="far fa-trash-alt tm-product-delete-icon"></i>
            </button>
        </form>
    </td>
    <td>
    <form action="{{route('admin.change_pd')}}" method="GET">
    @csrf
    <input type="hidden" name="pd_id" value="{{ $p->id }}">
    <button type="submit" style="background: none; border: none; padding: 0; cursor: pointer;">
        <i class="fa-solid fa-wrench"></i>
    </button>
      </form>
    </td>
</tr>
@endforeach
     

                
       
          
 
         
                </tbody>
              </table>
            </div>
            <!-- table container -->
            <a
              href="admin/add_pd"
              class="btn btn-primary btn-block text-uppercase mb-3">Add new product</a>
            
          </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 tm-block-col">
          <div class="tm-bg-primary-dark tm-block tm-block-product-categories">
            <h2 class="tm-block-title">Product Categories</h2>
            <div class="tm-product-table-container">
              <table class="table tm-table-small tm-product-table">
                <tbody>
                @foreach($cates as $category)
  <tr>
    <td class="tm-product-name">{{ $category->name_list }}</td>
    <td class="text-center">
      
 
      
   
    <form action="{{ route('admin.deletect', ['id' => $category->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" style="background: none; border: none; padding: 0; cursor: pointer;">
                <i class="far fa-trash-alt tm-product-delete-icon"></i>
            </button>
        </form>
    </td>
    <td class="text-center">
      
    <form action="{{route('admin.change_cate')}}" method="GET">
    @csrf
    <input type="hidden" name="cate_id" value="{{ $category->id }}">
    <button type="submit" style="background: none; border: none; padding: 0; cursor: pointer;">
        <i class="fa-solid fa-wrench"></i>
    </button>
</form>
    </td>
  </tr>
@endforeach
                
                 
            
                </tbody>
              </table>
            </div>
            <!-- table container -->
            <a
              href="add_cate"
              class="btn btn-primary btn-block text-uppercase mb-3">Add new cate</a>
            
          </div>
        </div>
      </div>
    </div>
    <footer class="tm-footer row tm-mt-small">
      <div class="col-12 font-weight-light">
        <p class="text-center text-white mb-0 px-4 small">
          Copyright &copy; <b>2018</b> All rights reserved. 
          
          Design: <a rel="nofollow noopener" href="https://templatemo.com" class="tm-footer-link">Template Mo</a>
        </p>
      </div>
    </footer>

    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script>
      $(function() {
        $(".tm-product-name").on("click", function() {
          window.location.href = "edit-product.html";
        });
      });
    </script>
  </body>
</html>
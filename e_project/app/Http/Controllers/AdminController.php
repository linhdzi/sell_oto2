<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AdminController extends Controller
{
    //
    public function admin()
{
    $products = DB::table('products')->select('*')->get();

    $cates = DB::table('categories')->select('*')
    ->where('parent_id','=',3)
    ->get();



    
    
    return view('admin.admin', compact('products', 'cates'));
}

public function add_pd()
{
    $cates = DB::table('categories')
        ->select('*')
        ->where('parent_id', '=', 3)
        ->get();
    
    // Kiểm tra nếu có yêu cầu POST để thêm sản phẩm
    if (request()->isMethod('post')) {
        $newProduct = [
            'name' => request('name'),
            'price' => request('price'),
            'description' => request('description'),
            'rating' => request('rating'),
            'horse_power' => request('horse_power'),
            'promtion' => request('promtion'),
            'pic' => request('picture'),
            //Thêm các trường thông tin khác của sản phẩm tại đây
        ];

        // Thêm sản phẩm mới vào cơ sở dữ liệu
        $productId = DB::table('products')->insertGetId($newProduct);

        $Cate_Pd = [
            'products_id' => $productId,
            'categories_id' => request('category_id'),
        ];

        DB::table('category_products')->insert($Cate_Pd);
        
        // Chuyển hướng người dùng sau khi thêm sản phẩm thành công
        return redirect()->back()->with('success', 'Thêm sản phẩm thành công!');
    }
    
    return view('admin.add_pd', compact('cates'));
}


public function deletePd(Request $request)
{

    $products = DB::table('products')->select('*')->get();

    $cates = DB::table('categories')->select('*')
    ->where('parent_id','=',3)
    ->get();



    $id = $request->input('id');

    // Xóa các bản ghi trong bảng `category_products` có liên quan đến `products`
    DB::table('category_products')->where('products_id', $id)->delete();

    // Xóa bản ghi trong bảng `products`
    DB::table('products')->where('id', $id)->delete();

    return view('admin.admin', compact('products', 'cates'));
}

public function get_pd(Request $request)
{
    $cates = DB::table('categories')->select('*')
    ->where('parent_id','=',3)
    ->get();
    //$id = $request->input('cate_id');
    $id = $_GET['pd_id'];
    
    // dd($id);s
    $pd = DB::table('products')->select('*')
    // ->where('parent_id','=',3)
    ->select('*')
    ->where('id','=',$id)
    ->first();

   // dd($pd);

    

    return view('admin.change_pd',compact( 'pd', 'cates'));
}


public function change_pd()
{
    $cates = DB::table('categories')
        ->select('*')
        ->where('parent_id', '=', 3)
        ->get();
        $products = DB::table('products')->select('*')->get();

    // Kiểm tra nếu có yêu cầu POST để thêm sản phẩm
    if (request()->isMethod('post')) {
        $newProduct = [
            'name' => request('name'),
            'price' => request('price'),
            'description' => request('description'),
            'rating' => request('rating'),
            'horse_power' => request('horse_power'),
            'promtion' => request('promtion'),
            'pic' => request('picture'),
            //Thêm các trường thông tin khác của sản phẩm tại đây
        ];

        // Thêm sản phẩm mới vào cơ sở dữ liệu
        DB::table('products')->where('id', request('id'))->update($newProduct);

        $Cate_Pd = [
            
            'categories_id' => request('category_id'),
        ];

        DB::table('category_products')->where('products_id',request('id'))->update($Cate_Pd);
        
        // Chuyển hướng người dùng sau khi thêm sản phẩm thành công
        
    }
    
    return view('admin.admin', compact('products', 'cates'));
}




public function add_cate()
{
    
    
    // Kiểm tra nếu có yêu cầu POST để thêm sản phẩm
    if (request()->isMethod('post')) {
        $newCate = [
            'name_list' => request('name'),
            'type' => 'Brand',
            'link' =>  '/customers/shop', 
            'parent_id' => '3',
            //Thêm các trường thông tin khác của sản phẩm tại đây
        ];

       

        // Thêm sản phẩm mới vào cơ sở dữ liệu
        DB::table('categories')->insert($newCate);
        
        // Hoặc nếu bạn đã tạo model Product, bạn có thể sử dụng:
        // Product::create($newProduct);
        
        // Chuyển hướng người dùng sau khi thêm sản phẩm thành công
        return redirect()->back()->with('success', 'Thêm sản phẩm thành công!');
    }
    
    return view('admin.add_cate');
}


public function deleteCate(Request $request)
{
    $products = DB::table('products')->select('*')->get();

    $cates = DB::table('categories')->select('*')
        ->where('parent_id', '=', 3)
        ->get();

    $id = $request->input('id');

    // Xóa các bản ghi trong bảng `category_products` có liên quan đến `products`
    DB::table('category_products')->where('categories_id', $id)->delete();


    // Xóa bản ghi trong bảng `categories`
    DB::table('categories')->where('id', $id)->delete();

    return view('admin.admin', compact('products', 'cates'));
}    

public function get_cate(Request $request)
{
    //$id = $request->input('cate_id');
    $id = $_GET['cate_id'];
    // dd($id);s
    $cates = DB::table('categories')->select('*')
    // ->where('parent_id','=',3)
    ->where('id','=',$id)
    ->first();


    

    return view('admin.change_cate',compact( 'cates'));
}


public function change_cate()
{

    $products = DB::table('products')->select('*')->get();

    $cates = DB::table('categories')->select('*')
    ->where('parent_id','=',3)
    ->get();

    // Kiểm tra nếu có yêu cầu POST để thay đổi danh mục
    if (request()->isMethod('post')) {
        $newCate = [
            'name_list' => request('name'),
            'type' => 'Brand',
            'link' =>  '/customers/shop', 
            'parent_id' => '3',
            //Thêm các trường thông tin khác của danh mục tại đây
        ];

        // Thay đổi danh mục trong cơ sở dữ liệu
        DB::table('categories')->where('id', request('id'))->update($newCate);

  
    }

    return view('admin.admin', compact('products', 'cates'));
}



}

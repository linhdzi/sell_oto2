<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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


    
}

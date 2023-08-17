<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\categories;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function getCate(){
        $index_products = DB::table('products')
                          ->select('*') 
                          ->where('promtion','=',1)  
                          ->get()
        ;
        return view('customers.index',compact('index_products'));
    }

    public function detail($id){
        $products = DB::table('products')
                    ->select('*')
                    ->where('id','=',$id)
                    ->get();    
        return view('customers.detail',compact('products'));
    }
    public function shop($id){
        $products = DB::table('products')
                    ->select('*')
                    ->join('category_products', 'products.id', '=', 'category_products.products_id')
                    ->join('categories','categories.id','=','category_products.categories_id')
                    ->where('category_products.categories_id','=',$id)
                    ->get();
        return view('customers.shop',compact('products'));
    }

  
}

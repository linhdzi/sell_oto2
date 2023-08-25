<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
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
                    ->select('products.id','products.pic','products.name','products.description','products.price',)
                    ->join('category_products', 'products.id', '=', 'category_products.products_id')
                    ->join('categories','categories.id','=','category_products.categories_id')
                    ->where('category_products.categories_id','=',$id)
                    ->get();
        
        return view('customers.shop',compact('products'));
    }
    public function getAll(Request $request){
        $keyword = "";
        if($request != null){
            $keyword = $request -> input("_keyword");
        }
        $results = null;
        if($keyword == ""){
            //Lấy ra toàn bo
            $results = DB::table('products')
                      ->select('*')
                      ->get();
        }
        if($keyword != ""){
            //Lay ra config theo tim kiem
            $results = DB::table('products')
                            ->where('name','like','%'.$keyword.'%')
                            ->get();
        }
        return view('customers.search',compact('keyword','results'));
    }
    public function createAccount(Request $request){
        $username="";
        $password="";
        $confirm_password = "";
        $results= null;
        if($request != null){
            $username = $request -> input("username");
            $password = $request -> input("password");
            $confirm_password = $request -> input("confirm_password");
        }
        if($password == $confirm_password){
            $value = DB::table('customers')->insert([
                'phone_number' => $username,
                'password' => $password,
            ]);    
            echo"<script>alert('Dang ky thanh cong');</script>";
        }else{
            echo"<script>alert('Dang ky that bai');</script>";
        }
        return view('customers.login');
    }
    public function Access(Request $request)
    {
        $results = $this->getCate();

        if ($request != null && $request->has('username') && $request->has('password')) {
            $username = $request->input('username');
            $password = $request->input('password');
            
            $value = DB::table('customers')
                ->select('*')
                ->where('phone_number', '=', $username)
                ->where('password', '=', $password)
                ->get();
                $user = $value->first();
            if ($value->count() > 0) {
                echo "<script>alert('Đăng nhập thành công');</script>";

                Session::put('id_customer',$user -> id);
                Session::put('username',$username);
                Session::put('password',$password);
                
                return $results;
            } else {
                echo "<script>alert('Đăng nhập thất bại');</script>";
                return view('customers.login');
            }
        } else {
            echo "<script>alert('Dữ liệu không hợp lệ');</script>";
            return view('customers.login');
        }
    }
    public function Logout(){
        Session::flush();
        return view('customers.login');
    }

    public function Addcart($id)
{
    $customerId = Session::get('id_customer');
    if ($customerId) {
        $value = DB::table('customers_products')    
            ->select('*')
            ->where('customers_id', '=', $customerId)
            ->where('products_id', '=', $id)
            ->first();

        if ($value) {
            $quantity = $value->quantity + 1;
            DB::table('customers_products')
                ->where('customers_id', $customerId)
                ->update(['quantity' => $quantity]);
        } else {
            DB::table('customers_products')->insert([
                'customers_id' => $customerId,
                'products_id' => $id,
                'quantity' => 1,
            ]);
        }
        session()->flash('success', 'Add cart thành công');
        return redirect()->back();
    } else {
        session()->flash('error', 'Add cart fail pls login');
        return redirect()->back();
    }
}
    
    public function Rendercard(){
            $number = 0;
            $id = Session::get('id_customer');
            if($id){
                $results = DB::table('products')
                       ->select('*')
                       ->join('customers_products', 'products.id', '=', 'customers_products.products_id')
                       ->where('customers_products.customers_id','=', $id)
                       ->get();
                foreach($results as $result){
                    $result -> totalprice = $result -> quantity * $result -> price;
                }
                return view('customers.cart',compact('results','number')) ;
            }else{
                echo "<script>alert('Pls Login');</script>";
                return view('customers.login');
            }

                      
        }
    public function Deletecard($id){
            $id_customer = Session::get('id_customer');
            $results = DB::table('customers_products')
                       ->select('*')
                       ->where('customers_products.customers_id','=', $id_customer)
                       ->where('customers_products.products_id','=', $id)
                       ->first();
            $value=$results -> quantity;           
            if($value >1){
                DB::table('customers_products')
                
                ->where('customers_products.customers_id','=', $id_customer)
                ->where('customers_products.products_id','=', $id)
                ->update(['quantity' => $results -> quantity -1 ]);
            }else{
                DB::table('customers_products')           
                ->where('customers_products.customers_id','=', $id_customer)
                ->where('customers_products.products_id','=', $id)
                ->delete();
                ;
            }
            $return = $this->Rendercard();
            return $return;
    }
    
    public function Get_id_to_compare()
    {
        $id_customer = Session::get('id_customer');
        if (request()->isMethod('post')) {
            $newCate = [
                'products_id' => request('name'),
                'customers_id' =>  $id_customer,
            ];
    
           
    
            // Thêm sản phẩm mới vào cơ sở dữ liệu
            DB::table('customers_products')
            
            ->insert($newCate);
        }   
        return view('/customers/compare') ;
    }

    public function Show_compare_product()
    {
        $products = DB::table('products')->select('*')
        
        ->get();

       
    
    
    
        
        
   






        return view('/customers/compare', compact('products')) ;
    }

    public function show_about()
    {
        
        return view('/customers/about') ;
    }





}
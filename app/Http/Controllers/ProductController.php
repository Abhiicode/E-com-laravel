<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Session;
use Exception;
use Illuminate\Support\Facades\DB;
use App\Services\ProductServices;
class ProductController extends Controller
{
   private $productService;


   public function __construct(ProductServices $productService){
      $this->productService = $productService;
   }
   public function index(){
      $data = Product::all();
      return view('product',['products'=>$data]);
   }
   public function detail($id){
      $data = Product::find($id);   
      return view('detail',['product'=>$data]);
   }
   public function add_to_cart(Request $req){
      try{
         if($req->session()->has('user')){
            $this->productService->addToCartService($req);
            return redirect('/');
         }else{
            return redirect('/login');
         }
      }catch(Exception $err){
         throw $err;
      }
   }

   static public function cartItem(){
      $userId = Session::get('user')['id'];
      return Cart::where('user_id',$userId)->count();
   }
   
   public function cartlist(){
      try{
         return $this->productService->showCartListService();
      }catch(Exception $err){
         throw $err;
      }
   }
   public function removeCart($id){
      try{
         return $this->productService->removeFromCartService($id);
      }catch(Exception $err){
         return $err;
      }
   }
}  
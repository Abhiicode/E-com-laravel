<?php

namespace App\Repositories;
use Illuminate\Http\Request;
use Session;
use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Hash;
use App\Models\Cart;
use App\Models\User;
class EloquentProduct implements ProductRepoInterface
{

    public function addToCart(Request $req)
    {
        $cart = new Cart;
        $cart->user_id = $req->session()->get('user')['id'];
        $cart->product_id = $req->product_id;
        $cart->save();
        return true;
    }

    public function showCartList()
    {
        $userId = Session::get('user')['id'];   //TODO getting userId from our session as we are putting Id after 
                                                //? user logged into our application
        $products = DB::table('cart')
            ->join('products', 'cart.product_id', '=', 'products.id')
            ->where('cart.user_id', $userId)
            ->select('products.*', 'cart.id as cart_id')
            ->get();
        //! sending data to the view to show in cartList page
        return view('cartlist', ['products' => $products]);
    }

    public function removeFromCart($id)
    {   
        //* getting selected cart item so we can delete that from our database
        $selectedItem = Cart::find($id);
        $selectedItem->delete();

        return redirect("/cartlist");
    }

    public function registerUser(Request $req){
        try{
            $user = new User;
            $user->name = $req->firstName." ".$req->lastName;
            $user->email = $req->email;
            $user->password = Hash::make($req->password);
            $user->save();
            return back()->with('success', 'New user has been succesfully registered');
        }catch(Exception $err){
            return back()->with('fail', 'Something went wrong, try again later');
        }

        
    }
}

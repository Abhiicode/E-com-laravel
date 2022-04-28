<?php
namespace App\Repositories;

use Illuminate\Http\Request;

interface ProductRepoInterface
{

    public function addToCart(Request $req);

    public function showCartList();

    public function removeFromCart($id);

    public function registerUser(Request $req);
};

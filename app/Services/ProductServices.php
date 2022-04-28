<?php
namespace App\Services;
use Illuminate\Http\Request;
use App\Repositories\ProductRepoInterface;
class ProductServices
{
    private $productRepo;

    public function __construct(ProductRepoInterface $productRepo){
       $this->productRepo = $productRepo;
    }


    public function addToCartService(Request $req)
    {
        
        $this->productRepo->addToCart($req);
    }

    public function showCartListService()
    {
        return $this->productRepo->showCartList();
    }

    public function removeFromCartService($id)
    {
        return $this->productRepo->removeFromCart($id);
    }

    public function registerUser(Request $req){
         return $this->productRepo->registerUser($req);
    }
};

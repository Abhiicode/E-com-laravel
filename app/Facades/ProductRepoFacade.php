<?php
namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class ProductRepoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ProductRepoFacade';
    }
}

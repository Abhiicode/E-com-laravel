@extends('master')
@section("content")
<div class="custom-product">
    <div class="col-sm-4">
        <div class="trending-wrapper">
            <h4>Result for products</h4>
            @foreach ($products as $product)
        <div class="row searched-item cart-list-divider">
            <div class="col-sm-3 m-2">
                    <a href="detail/"{{$product->id}}>
                    <img class="trending-image" src="{{$product->gallery}}" alt="trendimg">
                </a>
            </div>
            <div class="col-sm-3 m-5">
                <div class="">
                    <h2>{{$product->name}}</h2>
                </div>
            </div>
            <div class="col-sm-3 m-1">
                <a href="/removecart/{{$product->cart_id}}">
                    <button class="btn btn-warning">Remove to cart</button>
                </a>
            </div>
        </div>

            @endforeach
        </div>
    </div>
</div>
@endsection
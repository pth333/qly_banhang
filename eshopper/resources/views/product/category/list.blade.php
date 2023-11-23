@extends('layouts.master')
@section('title','Home page')

@section('css')
<link rel="stylesheet" href="{{ asset('home/home.css')}}">
@endsection

@section('content')

@php
$files = 'http://127.0.0.1:8000'
@endphp

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                @include('components.sidebar')
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Features Items</h2>
                    @foreach($product as $productItem)
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{ $files . $productItem->feature_image_path}}" alt="" />
                                    <h2>{{number_format($productItem->price)}}VND</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2>$56</h2>
                                        <p>Easy Polo Black Edition</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                    <li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <ul class="pagination">
                        {{$product->links()}}
                    </ul>
                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>


@endsection


@section('js')
<link rel="stylesheet" href="{{ asset('home/home.js')}}">
@endsection
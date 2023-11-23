@extends('layouts.master')
@section('title','Home page')

@section('css')
<link rel="stylesheet" href="{{ asset('home/home.css')}}">
@endsection

@section('content')

<!-- Slider -->
@include('home.components.slider')
<!-- Slider -->
<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				@include('components.sidebar')
			</div>

			<div class="col-sm-9 padding-right">
				<!-- feature_item -->
				@include('home.components.feature_product')
				<!-- feature_item -->
				<!--category-tab-->
				@include('home.components.category_tab')
				<!--/category-tab-->

				<!-- recomment_item -->
				@include('home.components.recommend_product')
				<!-- recomment_item -->
			</div>
		</div>
	</div>
</section>


@endsection


@section('js')
<link rel="stylesheet" href="{{ asset('home/home.js')}}">
@endsection


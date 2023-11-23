@extends('layouts.website')
@section('content')
<br><br><br>
<section class="food_section layout_padding-bottom">
  <div class="container-fluid">
    <div class="row pt-0 m-1">
      <div class="col-lg-2 col-md-3 col-sm-3 p-3">
        <!-- Keep the vertical navbar sticky -->
        <div style="position: sticky; top: 30px;" class="vertical-navbar mt-5" style="height: 300px; overflow-y: auto;">
          <ul class="filters_menu" id="filters_menu">
            @php
            $firstCategory = true;
            @endphp
            @foreach ($categories as $category)
            <li data-filter=".{{ $category->title }}" onclick="filterProducts('{{ $category->id }}')" @if ($firstCategory) class="active" @php $firstCategory=false; @endphp @endif>
              {{ $category->title }}
            </li>
            @endforeach
          </ul>
        </div>
      </div>
      <div class="col-lg-10 col-md-9 col-sm-9 p-0">
        <div class="heading_container heading_center">
          <h2>Our Menu</h2>
          @if(session()->has('message'))
          <div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            {{ session()->get('message') }}
          </div>
          @endif
        </div>
        <div class="filters-content" id="products-container">
          <div class="row">
            @foreach ($products as $product)
            <div class="col-lg-4 col-sm-6 p-0 all category-{{ $product->category?->id}}">
              <div class="box m-3 p-0">
                <div class="img-box">
                  <img class="img-fluid" src="{{ asset('/img/products/'.$product->image)}}" alt="{{ $product->name }}">
                </div>
                <div class="detail-box">
                 <h3> {{$product->name}}</h3>
                  <div class="options">
                    <h6 class="text-start">
                      <h5 class="ml-0"> Price: {{config('app.currency')}}{{ $product->price }}</h5>
                    </h6>
                    <a style="max-width: 20%;" href="{{route('cart.add' , $product)}}">
                      <i style="color: white;" class="fa fa-plus"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<div id="scroll-to-top">Top</div>
<!-- end food section -->

@endsection
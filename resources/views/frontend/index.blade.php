@extends('layouts.app')
@section('title','Home page')

@section('content')

<div>
   <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
  
  <div class="carousel-inner">
    @foreach ($sliders as $key => $sliderItem)
      <div class="carousel-item {{$key == 0 ? 'active' :''}}  ">
        @if ($sliderItem->image)
        <div style="width: 100vw; height:500px" class="d-flex justify-center">
          <img src="{{ asset("$sliderItem->image") }}" class="d-block w-100" alt="...">
        </div>
        @endif
        <div class="carousel-caption d-none d-md-block">
          <h5>{{ $sliderItem->title }}</h5>
          <p>{{ $sliderItem->description }}</p>
        </div>
      </div>
    @endforeach
  
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

</div>

<div class="py-5 bg-white">
  <div class="contianer">
    <div class="row justify-content-center">
      <div class="col-md-8 text-center">
        <h4>Welcome to SBTC of Web It E-commerce</h4>
        <div class="undefine"></div>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.
           Fuga quod ab unde at ipsum totam nulla culpa,
            dolore sunt rem reprehenderit.
             Velit eaque expedita amet laudantium aut! Doloribus, dolor iusto?</p>
      </div>
    </div>
    
  </div>
</div>

<div class="py-5 bg-white">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
          <div class="col-md-12">
            <h4>Trending Products</h4>
            <div class="underline"></div>
          </div>
        
          @if ($trendingProducts)
            <div class="col-md-12">
              <div class="owl-carousel owl-theme">
                  @foreach ($trendingProducts as $productItem)
                    <div class="item">
                      <div class="product-card">
                        <div class="product-card-img">
                            <label class="stock bg-danger">New</label>

            
                            @if ($productItem->productImages->count()>0)
                                <a href=" {{url('/collections/productDetails/'.$productItem->category->slug.'/'.$productItem->slug)}} ">
                                    <img src=" {{asset($productItem->productImages[0]->image)}} " alt="{{$productItem->name}}">
                                </a>
                            @endif
            
                        </div>
                        <div class="product-card-body">
                            {{-- <p class="product-brand">{{$productItem->brand}}</p> --}}
                            <h5 class="product-name">
                            <a href=" {{url('/collections/productDetails/'.$productItem->category->slug.'/'.$productItem->slug)}}">
                                    {{$productItem->name}}
                            </a>
                            </h5>
                            <div>
                                <span class="selling-price"> $ {{$productItem->selling_price}}</span>
                                <span class="original-price"> $ {{$productItem->original_price}}</span>
                            </div>
                            <div class="mt-2">
                                <a href=" {{url('/collections/productDetails/'.$productItem->category->slug.'/'.$productItem->slug)}}" class="btn btn1">Add to category </a>
                                <button wire:click="addToWishList({{$productItem->id }})"  class="btn btn1"> 
                                    <span  wire:target="addToWishList">
                                        <i class="fa fa-heart"></i>
                                    </span>
                                </button>
                                <a href=" {{url('/collections/productDetails/'.$productItem->category->slug.'/'.$productItem->slug)}}" class="btn btn1">View </a>
                            </div>
                        </div>
                      </div>
                        
                    </div>
                  @endforeach
              </div>
            </div>
          @endif
      </div>
      <div class="col-md-12">
        <h4 class="p-2">No Products Avaiable </h4>
      </div>
    </div>
  </div>
</div>


@endsection

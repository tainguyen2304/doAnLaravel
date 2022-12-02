@extends('layouts.app')
@section('title','New arrival')

@section('content')

<div class="py-5 bg-white">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
            <div class="col-md-12">
              <h4>New Arrivals</h4>
              <div class="underline"></div>
            </div>
          
            <div class="row">
                @forelse ($newArrivalProducts as $productItem)
                    <div class="col-md-3">
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
                @empty
                    <div class="col-md-12 p-2">
                        <h4 class="p-2">No Products Avaiable </h4>
                    </div>
                @endforelse 

            <div class="text-center">
                <a href=" {{url('collections')}} " class="btn btn-warning px-3">View more</a>
            </div>
            
            </div>
        </div>
      
      </div>
    </div>
  </div>
  


@endsection
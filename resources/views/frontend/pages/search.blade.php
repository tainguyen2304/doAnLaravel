@extends('layouts.app')
@section('title','Search product')

@section('content')

<div class="py-5 bg-white">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="col-md-12">
              <h4>Search results</h4>
              <div class="underline"></div>
            </div>
          
            <div class="row">
                @forelse ($searchProducts as $productItem)
                    <div class="col-md-10">
                        <div class="product-card">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="product-card-img">
                                        <label class="stock bg-danger">New</label>

                        
                                        @if ($productItem->productImages->count()>0)
                                            <a href=" {{url('/collections/productDetails/'.$productItem->category->slug.'/'.$productItem->slug)}} ">
                                                <img src=" {{asset($productItem->productImages[0]->image)}} " alt="{{$productItem->name}}">
                                            </a>
                                        @endif
                        
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="product-card-body">
                                        <h5 class="product-name">
                                        <a href=" {{url('/collections/productDetails/'.$productItem->category->slug.'/'.$productItem->slug)}}">
                                                {{$productItem->name}}
                                        </a>
                                        </h5>
                                        <div>
                                            <span class="selling-price"> $ {{$productItem->selling_price}}</span>
                                            <span class="original-price"> $ {{$productItem->original_price}}</span>
                                        </div>
                                        <p style="height: 45px;overflow:hidden">
                                            <b> Description: </b> {{$productItem->description}}
                                        </p>
                                        <a href=" {{url('/collections/productDetails/'.$productItem->category->slug.'/'.$productItem->slug)}}" class="btn btn-outline-primary">View </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12 p-2">
                        <h4 class="p-2">No such Products found </h4>
                    </div>
                @endforelse 
                <div>
                    {{$searchProducts->links()}}
                </div>
                    
            </div>
        </div>
      
      </div>
    </div>
  </div>
  


@endsection
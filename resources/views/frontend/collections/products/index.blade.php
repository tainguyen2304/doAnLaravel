@extends('layouts.app')

@section('title')
{{$category->title}}
@endsection

@section('meta_keyword')
{{$category->meta_keyword}}
@endsection

@section('meta_description')
{{$category->meta_description}}
@endsection


@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h4>Brands</h4>
                </div>
                <div class="card-body">
                    <ul>
                        @foreach ($category->brands as  $brandItem)
                        <li >
                            <a href="{{ url('/collections/'.$category->slug.'/'.$brandItem->name)}}" style="text-decoration: none; color: #333;">
                                {{$brandItem->name}}
                            </a>
                        </li>
                    @endforeach
                    </ul>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Price</h4>
                </div>
                <div class="card-body">
                    <ul>
                        <li>
                            <a href="{{ url('/collections/'.$category->slug.'/high-to-low')}}" style="text-decoration: none; color: #333;">
                                High to Low
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/collections/'.$category->slug.'/low-to-high')}}" style="text-decoration: none; color: #333;">
                                Low to High
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="py-3 py-md-5 bg-light">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="mb-4">Our Products</h4>
                            </div>

                            @forelse ($products as $productItem)
                                <div class="col-md-3">
                                    <div class="product-card">
                                        <div class="product-card-img">
                                            @if ($productItem->quantity > 0)
                                                <label class="stock bg-success">In Stock</label>
                                            @else
                                                <label class="stock bg-danger">Out of Stock</label>
                                            @endif
                
                                            @if ($productItem->productImages->count()>0)
                                                <a href=" {{url('/collections/productDetails/'.$productItem->category->slug.'/'.$productItem->slug)}} ">
                                                    <img src=" {{asset($productItem->productImages[0]->image)}} " alt="{{$productItem->name}}">
                                                </a>
                                            @endif
                
                                        </div>
                                        <div class="product-card-body">
                                            <p class="product-brand">{{$productItem->brand}}</p>
                                            <h5 class="product-name">
                                            <a href=" {{url('/collections/productDetails/'.$productItem->category->slug.'/'.$productItem->slug)}}">
                                                    {{$productItem->name}}
                                            </a>
                                            </h5>
                                            <div>
                                                <span class="selling-price">  {{$productItem->selling_price}}</span>
                                                <span class="original-price">  {{$productItem->original_price}}</span>
                                            </div>
                                            <div class="mt-2">
                                                <a href="" class="btn btn1">Add To Cart</a>
                                                <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>
                                                <a href="" class="btn btn1"> View </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-md-12">
                                    <h4 class="p-2">No Products Avaiable for {{ $category->name }}</h4>
                                </div>
                
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

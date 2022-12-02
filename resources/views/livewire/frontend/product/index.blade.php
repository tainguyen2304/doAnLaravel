<div class="row">
    <div class="col-md-3">
        @if ($category->brands)
            
        <div class="card">
            <div class="card-header">
                <h4>Brands</h4>
            </div>
            <div class="card-body">
                @foreach ($category->brands as  $brandItem)
                   
                    <label class="d-block" for="">
                        <input type="checkbox" wire:model="brandInputs" value="{{$brandItem->id}}">  {{$brandItem->name}}
                    </label>
                @endforeach
            </div>
        </div>
        @endif
        
        <div class="card">
            <div class="card-header">
                <h4>Price</h4>
            </div>
            <div class="card-body">
                <label class="d-block" for="">
                    <input type="radio" name="priceSoft" wire:model="priceInput" value="high-to-low">  High to low
                </label>    
                <label class="d-block" for="">
                    <input type="radio" name="priceSoft" wire:model="priceInput" value="low-to-high">  Low to high
                </label>   
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
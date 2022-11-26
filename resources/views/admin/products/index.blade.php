@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">

        @if (session('message'))
                <div class="alert alert-success">
                    {{
                        session('message')
                    }}
                </div>
            @endif
    
        <div class="card">
            <div class="card-header">
                <h3>Products
                    <a href=" {{url('admin/products/create')}} " class="btn btn-primary btn-sm float-end text-white float-end">
                        Add Product
                    </a>
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                        
                        
                            <tr>
                                <td> {{ $product->id }} </td>
                                <td> 
                                    @if ($product->category)
                                    {{ $product->category->name }} 
                                    @else
                                        No Category
                                    @endif
                                   
                                </td>
                                <td> {{ $product->name }} </td>
                                <td> {{ $product->selling_price }} </td>
                                <td> {{ $product->quantity}} </td>
                                <td> {{ $product->status == '1' ? 'Hidden': 'Visible'}} </td>
                                <td> 
                                    <div class="modal fade" id="deleteModalProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h1 class="modal-title fs-5" id="exampleModalLabel">Category delete</h1>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="{{ url('admin/products/delete/'.$product->id) }}" method="get">
                                                <div class="modal-body">
                                                    <h6>Are you sure want to delete this product?</h6>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Delete</button>
                                                </div>
                                            </form>
                                           
                                          </div>
                                        </div>
                                      </div>
                                    <a href="{{ url('admin/products/'.$product->id.'/edit') }}" class="btn btn-success">Edit</a>
                                    <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModalProduct">Delete</a>

                                        
                                </td>
                            </tr>

                            @empty
                            <tr>
                                <td colspan="7">No Products Available</td>
                            </tr>
                                
                            
                        @endforelse
                    </tbody>
                </table>

                {{-- {{ $products->links() }} --}}
            </div>
        </div>
    </div>
</div>

@endsection
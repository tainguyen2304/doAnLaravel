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
                <h3>Colors List
                    <a href=" {{url('admin/colors/create')}} " class="btn btn-primary btn-sm float-end text-white float-end">
                        Add Color
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
                       
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

@endsection
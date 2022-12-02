@extends('layouts.app')
@section('title','My Order Detail')

@section('content')
   
 <div class="py-5">
    <div class="container">
        <div class="row">
            
            <div class="col-md-12">
                @if (session('message'))
                <div class="alert alert-success mb-3">
                    {{
                        session('message')
                    }}
                </div>
            @endif
    
                <div class="shadow bg-white p-3">
                    <h4 class="text-primary">
                        <i class="fa fa-shopping-cart text-dark"></i> My order detail
                        <a href=" {{url('admin/orders')}} " class="btn btn-danger btn-sm float-end">Back</a>
                        <a href=" {{url('admin/invoice/'.$order->id.'/generate')}} " class="btn btn-primary  btn-sm float-end mx-1">
                            Download Invoice
                        </a>
                        <a href=" {{url('admin/invoice/'.$order->id)}}" target="_blank" class="btn btn-warning  btn-sm float-end mx-1">
                            View Invoice
                        </a>
                    </h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Order detail</h5>
                            <hr>
                            <h6>Order id: {{$order->id}}</h6>
                            <h6>Tracking Id/NO: {{$order->checking_no}}</h6>
                            <h6>Order created date: {{$order->created_at->format('d-m-Y h:i A')}}</h6>
                            <h6>Payment mode: {{$order->payment_mode}}</h6>
                            <h6 class="border p-2 text-success">
                                Order status message: <span class="text-uppercase">
                                    {{$order->status_message}}
                                </span>
                            </h6>
                        </div>
                        <div class="col-md-6">
                            <h5>User detail</h5>
                            <hr>
                            <h6>Full name: {{$order->fullname}}</h6>
                            <h6>Emial id: {{$order->email}}</h6>
                            <h6>Phone: {{$order->phone}}</h6>
                            <h6>Address: {{$order->address}}</h6>
                            <h6>Pin code: {{$order->pincode}}</h6>
                        </div>
                    </div>
                    <br>
                    <h5>Order Items</h5>

                    <div class="table-responsive">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <th>Item ID</th>
                                <th>Image</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </thead>
                            <tbody>
                                @php
                                $totalPrice =0
                            @endphp
                                @foreach ($order->orderItems as $orderItem)
                                    <tr>
                                        <td width="10%">{{$orderItem->id}}</td>
                                        <td width="10%">
                                            @if ($orderItem->product->productImages)
                                            <img src=" {{asset($orderItem->product->productImages[0]->image)}} " 
                                                                style="width: 50px; height: 50px" 
                                                                alt=" {{$orderItem->product->name}}">
                                            @else 
                                             <img src="" style="width: 50px; height: 50px"  alt="">
                                            @endif
                                        </td>
                                        <td>
                                            {{$orderItem->product->name}}
                                        </td>
                                        <td width="10%">
                                            ${{$orderItem->price}}
                                            
                                        </td>
                                        <td width="10%">    
                                            {{$orderItem->quantity}}
                                            
                                        </td>
                                        <td width="10%" class="fw-bold">
                                           ${{$orderItem->quantity * $orderItem->price }}
                                            
                                        </td>
                                        @php
                                            $totalPrice += $orderItem->quantity * $orderItem->price
                                        @endphp
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="5" class="fw-bold">Total Amount:</td>
                                    <td colspan="1" class="fw-bold">${{$totalPrice}}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div>
                            {{-- {{$orders->links()}} --}}
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-4">Order Process (Order status updates)</h4>
                        <hr>
                        <div class="row">
                            <div class="col-md-5">
                                <form action="{{url('admin/orders/'.$order->id)}} " method="POST">
                                    @csrf
                                    @method('PUT')
                                    <label for="">Update your order status</label>
                                    <div class="input-group">
                                        <select name="order_status"  class="form-select" id="">
                                            <option value="">Select Status</option>
                                            <option value="in progress" {{Request::get('status') == 'in progress' ? 'selected' : ''}} >In Progress</option>
                                            <option value="completed" {{Request::get('status') == 'completed' ? 'selected' : ''}}>Completed</option>
                                            <option value="pending" {{Request::get('status') == 'pending' ? 'selected' : ''}}>Pending</option>
                                            <option value="cancelled" {{Request::get('status') == 'cancelled' ? 'selected' : ''}}>Cancelled</option>
                                            <option value="out-of-delivery" {{Request::get('status') == 'out-of-delivery' ? 'selected' : ''}}>Out for delivery</option>
                                        </select>
                                        <button type="submit" class="btn bnt-primary">Filter</button>
                                    </div>
                                   
                                </form>
                            </div>
                            <div class="col-md-7">
                                <br>
                                <h4 class="mt-3">
                                    current order status: <span class="text-uppercase">
                                        {{$order->status_message}}
                                    </span>
                                </h4>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
 </div>
 @endsection
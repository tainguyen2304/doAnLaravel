@extends('layouts.app')
@section('title','Search product')

@section('content')

<div class="py-5 bg-white">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="col-md-12">
              <h4>User Profile
                <a href="{{url('change-password')}}" class="btn btn-warning float-end">Change password ?</a>
              </h4>
              <div class="underline mb-4"></div>
            </div>

            <div class="col-md-10">
                @if (session('message'))
                    <p class="alert alert-success">
                        {{session('message')}}
                    </p>
                @endif

                @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li class="text-danger">{{$error}}</li>
                        @endforeach
                    </ul>
                @endif

                <div class="card shadow">
                    <div class="card_header bg-primary">
                        <h4 class="mb-0 text-white">
                            User Details
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{url('profile')}}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-md-6 " >
                                    <div class="mb-3">
                                        <label for="" >
                                            Username
                                        </label>
                                        <input type="text" name="username" value="{{Auth::user()->name}}" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-md-6 " >
                                    <label for="" >
                                        Email Address
                                    </label>
                                    <input type="text" value="{{Auth::user()->email}}" name="email" class="form-control" readonly>
                                </div>
                                <div class="col-md-6 ">
                                    <label for="">
                                        Phone number
                                    </label>
                                    <input type="text" value="{{Auth::user()->userDetail->phone ?? ''}}" name="phone" class="form-control">
                                </div>
                               
                                <div class="col-md-6 ">
                                    <label for="">
                                        Zip/Pin code
                                    </label>
                                    <input type="text" value="{{Auth::user()->userDetail->pin_code ?? ''}}" name="pin_code" class="form-control">
                                </div>
                                <div class="col-md-6 ">
                                    <label for="">
                                        Address
                                    </label>
                                    <textarea rows="3" type="text" name="address" class="form-control">{{Auth::user()->userDetail->address ?? ''}}</textarea>
                                </div>
                              
        
                                <div class="col-md-12 md-3">
                                    <button type="submit" class="btn btn-primary float-end">
                                        Save Data
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
      </div>
    </div>
</div>
@endsection
@extends('layouts.admin')
@section('title','Edit Users')
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
                <h3> Add User
                    <a href=" {{url('admin/users')}} " class="btn btn-primary btn-sm float-end text-white float-end">
                        BACK
                    </a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{url('admin/users/'.$user->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">

                        <div class="col-md-6 " >
                            <label for="" >
                                Name
                            </label>
                            <input type="text" value="{{$user->name}}" name="name" class="form-control">
                        </div>
                        
                        <div class="col-md-6 " >
                            <label for="" >
                                Email
                            </label>
                            <input type="text" readonly value="{{$user->email}}" name="email" class="form-control">
                            @error('name')
                                <small class="text-danger">
                                    {{$message}}
                                </small>
                            @enderror
                        </div>
                        <div class="col-md-6 ">
                            <label for="">
                                Password
                            </label>
                            <input type="text" value="{{$user->password}}" name="password" class="form-control">
                            @error('slug')
                            <small class="text-danger">
                                {{$message}}
                            </small>
                        @enderror
                        </div>
                       
                        <div class="col-md-6 ">
                            <label for="">
                               Select Role
                            </label>
                            <br/>
                            <select name="role_as" class="form-control" >
                                <option value="">Select Role</option>
                                <option value="0" {{$user->role_as == '0'  ? 'selected' : ''}} >User</option>
                                <option value="1" {{$user->role_as == '1'  ? 'selected' : ''}} >Admin</option>
                            </select>
                        </div>

                        <div class="col-md-12 md-3">
                            <button type="submit" class="btn btn-primary float-end">
                                Update
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
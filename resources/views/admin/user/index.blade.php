@extends('layouts.admin')
@section('title','Users')
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
                <h3>Users
                    <a href=" {{url('admin/users/create')}} " class="btn btn-primary btn-sm float-end text-white float-end">
                        Add User
                    </a>
                </h3>
            </div>
            <div class="    card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                        
                        
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    @if ($user->role_as == '0')
                                        <label class="badge btn-primary">user</label>
                                    @elseif($user->role_as == '1')
                                        <label class="badge btn-success">Admin</label>
                                    @else
                                        <label class="badge btn-danger">none</label>
                                    @endif
                                </td>
                                <td> 
                                    <div class="modal fade" id="deleteModalProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h1 class="modal-title fs-5" id="exampleModalLabel">Category delete</h1>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="{{ url('admin/users/delete/'.$user->id) }}" method="get">
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
                                    <a href="{{ url('admin/users/'.$user->id).'/edit' }}" class="btn btn-success">Edit</a>
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

                {{-- {{ $users->links() }} --}}
            </div>
        </div>
    </div>
</div>

@endsection
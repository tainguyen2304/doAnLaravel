@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Add Color
                        <a href=" {{url('admin/colors')}} " class="btn btn-danger btn-sm float-end text-white float-end">
                           Back
                        </a>
                    </h3>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-warning">
                        @foreach ($errors as $error)
                                <div>{{$error}}</div>
                        @endforeach
                    </div>
                @endif
                    <form action="{{ url('admin/colors') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="row">
                            
                            <div class="col-md-6 md-3" >
                                <label  >
                                   Color Name
                                </label>
                                <input type="text" name="name" class="form-control">
                                @error('name')
                                    <small class="text-danger">
                                        {{$message}}
                                    </small>
                                @enderror
                            </div>
                            <div class="col-md-6 md-3">
                                <label >
                                    Color Code
                                </label>
                                <input type="text" name="code" class="form-control">
                                @error('code')
                                <small class="text-danger">
                                    {{$message}}
                                </small>
                            @enderror
                            </div>
                           
                            <div class="col-md-6 md-3">
                                <label >
                                    Status
                                </label>
                                <br/>
                                <input type="checkbox" name="status" > Checked=Hidden, Unchecked=Visible
                            </div>
    
                            <div class="col-md-12 md-3">
                                <button type="submit" class="btn btn-primary float-end">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
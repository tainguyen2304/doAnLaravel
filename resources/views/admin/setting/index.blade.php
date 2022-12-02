@extends('layouts.admin')

@section('title','Admin Setitng')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            @if (session('message'))
            
            <div class="alert alert-success">{{session("message")}}</div>
            @endif
            <form action="{{url('/admin/settings')}}" method="POST">
                @csrf

                
                <div class="card mb-3">
                    <div class="card-header bg-primary">
                        <h3>Website</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 md-3">
                                <label for="">
                                    Website name
                                </label>
                                <input name="website_name" value="{{$setting->website_name}}" type="text" class="form-control" rows="3">
                                @error('website_name')
                                <small class="text-danger">
                                    {{$message}}
                                </small>
                            @enderror
                            </div>
                            <div class="col-md-6 md-3">
                                <label for="">
                                    Website URL
                                </label>
                                <input type="text" name="website_url" value="{{$setting->website_url}}" class="form-control">
                                @error('website_url')
                                <small class="text-danger">
                                    {{$message}}
                                </small>
                            @enderror
                            </div>
                            <div class="col-md-6 md-3">
                                <label for="">
                                    Page Title
                                </label>
                                <br/>
                                <input type="text"  name="title"  value="{{$setting->title}}"class="form-control">
                                @error('title')
                                <small class="text-danger">
                                    {{$message}}
                                </small>
                            @enderror
                            </div>
        
                            </div>
                            <div class="col-md-6 md-3">
                                <label for="">
                                    Meta Keyword
                                </label>
                                <textarea  name="meta_keyword" class="form-control" rows="3">
                                    value="{{$setting->meta_keyword}}"
                                </textarea>
                                @error('meta_keyword')
                                <small class="text-danger">
                                    {{$message}}
                                </small>
                            @enderror
                            </div>
                            <div class="col-md-6 md-3">
                                <label for="">
                                    Meta Description
                                </label>
                                <textarea name="meta_description" class="form-control"  rows="3" >
                                    value="{{$setting->meta_description}}"
                                </textarea>
                                @error('meta_description')
                                <small class="text-danger">
                                    {{$message}}
                                </small>
                            @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header bg-primary">
                        <h3>Website - Infomation</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 md-3">
                                <label for="">
                                    Address
                                </label>
                                <input name="address" type="text" value="{{$setting->address}}" class="form-control" rows="3">
                                @error('address')
                                <small class="text-danger">
                                    {{$message}}
                                </small>
                            @enderror
                            </div>
                            <div class="col-md-6 md-3">
                                <label for="">
                                    Phone 1
                                </label>
                                <input type="text" name="phone1" value="{{$setting->phone1}}" class="form-control">
                                @error('phone1')
                                <small class="text-danger">
                                    {{$message}}
                                </small>
                            @enderror
                            </div>
                            <div class="col-md-6 md-3">
                                <label for="">
                                    Phone 2
                                </label>
                                <br/>
                                <input type="text"  name="phone2" value="{{$setting->phone2}}" class="form-control">
                                @error('phone2')
                                <small class="text-danger">
                                    {{$message}}
                                </small>
                            @enderror
                            </div>
        
                            </div>
                            <div class="col-md-6 md-3">
                                <label for="">
                                    Email Id 1
                                </label>
                                <textarea  name="email1" class="form-control" rows="3">
                                    value="{{$setting->email1}}"
                                </textarea>
                                @error('email1')
                                <small class="text-danger">
                                    {{$message}}
                                </small>
                            @enderror
                            </div>
                            <div class="col-md-6 md-3">
                                <label for="">
                                    Email Id 2
                                </label>
                                <textarea name="email2" class="form-control"  rows="3" >
                                    value="{{$setting->email2}}"
                                </textarea>
                                @error('email2')
                                <small class="text-danger">
                                    {{$message}}
                                </small>
                            @enderror
                            </div>
        
                           
                        </div>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header bg-primary">
                        <h3>Website - Social Media</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 md-3">
                                <label for="">
                                    Facebook (Optional)
                                </label>
                                <input name="facebook" type="text" class="form-control" value="{{$setting->facebook}}" rows="3">
                                @error('facebook')
                                <small class="text-danger">
                                    {{$message}}
                                </small>
                            @enderror
                            </div>
                            <div class="col-md-6 md-3">
                                <label for="">
                                    Twitter (Optional)

                                </label>
                                <br/>
                                <input type="text"  name="twitter"  value="{{$setting->twitter}}" class="form-control">
                                @error('twitter')
                                <small class="text-danger">
                                    {{$message}}
                                </small>
                            @enderror
                            </div>
                            <div class="col-md-6 md-3">
                                <label for="">
                                    Instagram (Optional)
                                </label>
                                <input type="text" name="instagram" value="{{$setting->instagram}}" class="form-control">
                                @error('instagram')
                                <small class="text-danger">
                                    {{$message}}
                                </small>
                            @enderror
                            </div>
                           
        
                            <div class="col-md-6 md-3">
                                <label for="">
                                    Youtube (Optional)
                                </label>
                                <textarea  name="youtube" class="form-control" rows="3">
                                    value="{{$setting->youtube}}"
                                </textarea>
                                @error('youtube')
                                <small class="text-danger">
                                    {{$message}}
                                </small>
                            @enderror
                            </div>
                           
                        </div>
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary text-white">Save setting</button>
                </div>
               
             
            </form>
        </div>
    </div>
@endsection
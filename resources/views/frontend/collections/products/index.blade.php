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
    <div>
        @livewire('frontend.product.index', ['category' => $category])
    </div>
@endsection

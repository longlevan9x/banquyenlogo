@extends('admin.index')
@section('content')
    @include('admin.category-district._form', compact('model'));
@endsection
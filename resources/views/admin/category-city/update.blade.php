@extends('admin.index')
@section('content')
    @include('admin.category-city._form', compact('model'));
@endsection
@extends('admin.index')
@section('content')
    @include('admin.post.list', compact('models'))
@endsection
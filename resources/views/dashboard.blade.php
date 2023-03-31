@extends('layout.main')

@section('content')

@if(auth()->user()->role_id == 1)
esti conectat in contul de admin
@endif



@endsection
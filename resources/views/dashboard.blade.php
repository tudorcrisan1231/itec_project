@extends('layout.main')

@section('content')

@if(auth()->user()->pass_change == null && auth()->user()->role_id !== 1)
    @livewire('user-new-password')
@elseif(auth()->user()->pass_change == 1 && auth()->user()->role_id !== 1 && auth()->user()->info==null)
    @livewire('users-form')
@else
    @livewire('users-table')
@endif

@endsection
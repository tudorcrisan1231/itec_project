@extends('layout.main')

@section('content')
you are logged in
<a href="{{ route('signout') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Sign out</a>

@endsection
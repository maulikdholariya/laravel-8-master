@extends('layouts.app')
@section('title','contact')
@section('content')
<h1>Contact page</h1>

@can('home.secret')
<a href="{{ route('home.secret') }}">Go to Special contact details!</a>

@endcan

@endsection

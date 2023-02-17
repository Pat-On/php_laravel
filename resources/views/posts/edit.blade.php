@extends('layouts.app')

@section('content')

    <h1>Edit Post</h1>

    <form method="post" action="/posts">
        <!-- PAGE EXPIRED WITHOUT @CSRF ANNOYING!!! -->
        @csrf 
        <input type="text" name="title" placeholder="Enter title">
        <input type="submit" name="submit">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </form>

@endsection
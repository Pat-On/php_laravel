@extends('layouts.app')

@section('content')

    <h1>Edit Post</h1>

    <form method="post" action="/posts/{{$post->id}}">
        <!-- TOKEN -->
        <!-- PAGE EXPIRED WITHOUT @CSRF ANNOYING!!! -->
        @csrf 

        <!-- Setting up the PUT method for Laravel-->
        <input type="hidden" name="_method" value="PUT">


        <input type="text" name="title" placeholder="Enter title" value="{{$post->title}}">
        <input type="submit" name="submit" value="UPDATE">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </form>

    <form method="post" action="/posts/{{$post->id}}">
        @csrf 
        <input type="hidden" name="_method" value="DELETE">

        <input type="submit" value="DELETE">

    </form>

@endsection
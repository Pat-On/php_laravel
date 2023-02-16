@extends('layouts.app')

@section('content')

<form method="post" action="/posts">
    <!-- PAGE EXPIRED WITHOUT @CSRF ANNOYING!!! -->
    @csrf 
    <input type="text" name="title" placeholder="Enter title">
    <input type="submit" name="submit">
</form>







@yield('footer')
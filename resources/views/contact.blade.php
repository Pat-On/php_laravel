@extends('layouts.app')

@section('content')



<h1>Contact Page </h1>

<ul>
@if(count($people))
    @foreach($people as $person)
        <li>{{$person}}</li>


    @endforeach
@endif

</ul>
@endSection

@section('footer')
<script>
    // alert("Hello visitor")
</script>
@stop
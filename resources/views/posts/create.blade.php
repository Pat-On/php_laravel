@extends('layouts.app')

@section('content')

    <h1>Create Post</h1>
    <!-- You can use as well 'url' => '/post'-->
    {!! Form::open(['method'=> "POST", 'action'  => 'App\Http\Controllers\PostController@store']) !!}
        {{-- @csrf  --}}
        <div class="form-group">
            {!! Form::label('title', 'Our Title') !!}
            {!! Form::text('title', null, ['class' => 'form-conmtroll']) !!}
        </div>

        <div>
            {!! Form::submit('Create Post', ['class'=> 'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}


        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}} </li>
                    @endforeach

                </ul>

            </div>

        @endif




@endsection

<!-- @yield('footer') -->
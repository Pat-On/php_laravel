@extends('layouts.app')

@section('content')

    <h1>Edit Post</h1>


        {{-- model binding it is going to allow us repoopulating data --}}
        {{-- interesting syntax compare to create.blade.php - binding --}}
        {!! Form::model($post, ['method'=> "PATCH", 'action'  => ['App\Http\Controllers\PostController@update', $post->id]]) !!}
            <div class="form-group">
                {!! Form::label('title', 'Our Title') !!}
                {!! Form::text('title', null, ['class' => 'form-conmtroll']) !!}
            </div>
            <div>
                {!! Form::submit('Update Post', ['class'=> 'btn btn-info']) !!}
            </div>
        {!! Form::close() !!}

        {!! Form::model($post, ['method'=> "DELETE", 'action'  => ['App\Http\Controllers\PostController@destroy', $post->id]]) !!}
            <div>
                {!! Form::submit('Delete Post', ['class'=> 'btn btn-danger']) !!}
            </div> 
        {!! Form::close() !!}

@endsection
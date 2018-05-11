@extends('layouts.app')

@section('content')
    <div class="container">
        {!! Form::model($post, ['url' => route('admin.posts.update', encode($post->id)), 'method' => 'PUT']) !!} 
            @include('admin.posts._form')
        {!! Form::close() !!}
    </div>
@endsection
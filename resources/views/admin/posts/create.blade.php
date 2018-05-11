@extends('layouts.app')

@section('content')
    <div class="container">
        {!! Form::open(['url' => route('admin.posts.store'), 'method' => 'POST']) !!} 
            @include('admin.posts._form')
        {!! Form::close() !!}
    </div>
@endsection
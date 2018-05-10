@extends('layouts.app')

@section('content')
    <div class="container">
        {!! Form::open(['url' => route('admin.categories.store'), 'method' => 'POST']) !!} 
            @include('admin.categories._form')
        {!! Form::close() !!}
    </div>
@endsection
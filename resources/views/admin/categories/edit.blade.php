@extends('layouts.app')

@section('content')
    <div class="container">
        {!! Form::model($category, ['url' => route('admin.categories.update', encode($category->id)), 'method' => 'PUT']) !!} 
            @include('admin.categories._form')
        {!! Form::close() !!}
    </div>
@endsection
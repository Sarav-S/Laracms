@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('admin.categories.create') }}" class="btn btn-link">
            Add Category
        </a>    
        @if ($categories->total())
            <div class="row">
                <div class="col-sm-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Is Deleted</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->slug }}</td>
                                <td>{{ $category->status_label }}</td>
                                <td>{{ $category->is_deleted }}</td>
                                <td>
                                    @if ($category->deleted_at)                            
                                        {!! Form::open(['url' => route('admin.categories.recover', encode($category->id)), 'method' => 'PUT']) !!}
                                            {!! Form::submit('Recover', ['class' => 'btn btn-link']) !!}
                                        {!! Form::close() !!}

                                        {!! Form::open(['url' => route('admin.categories.shift_delete', encode($category->id)), 'method' => 'DELETE']) !!}
                                            {!! Form::submit('Delete from trash', ['class' => 'btn btn-link']) !!}
                                        {!! Form::close() !!}
                                    @else
                                        <a href="{{ route('admin.categories.edit', encode($category->id)) }}" class="btn btn-link">
                                            EDIT
                                        </a>
                                        {!! Form::open(['url' => route('admin.categories.destroy', encode($category->id)), 'method' => 'DELETE']) !!}
                                            {!! Form::submit('DELETE', ['class' => 'btn btn-link']) !!}
                                        {!! Form::close() !!}
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <p class="alert alert-info">
                No categories found
            </p>
        @endif
    </div>
@endsection
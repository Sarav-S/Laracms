@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('admin.posts.create') }}" class="btn btn-link">
            Add Post
        </a>    
        @if ($posts->total())
            <div class="row">
                <div class="col-sm-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Is Deleted</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->status_label }}</td>
                                <td>{{ $post->is_deleted }}</td>
                                <td>
                                    @if ($post->deleted_at)                            
                                        {!! Form::open(['url' => route('admin.posts.recover', encode($post->id)), 'method' => 'PUT']) !!}
                                            {!! Form::submit('Recover', ['class' => 'btn btn-link']) !!}
                                        {!! Form::close() !!}

                                        {!! Form::open(['url' => route('admin.posts.shift_delete', encode($post->id)), 'method' => 'DELETE']) !!}
                                            {!! Form::submit('Delete from trash', ['class' => 'btn btn-link']) !!}
                                        {!! Form::close() !!}
                                    @else
                                        <a href="{{ route('admin.posts.edit', encode($post->id)) }}" class="btn btn-link">
                                            EDIT
                                        </a>
                                        {!! Form::open(['url' => route('admin.posts.destroy', encode($post->id)), 'method' => 'DELETE']) !!}
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
                No posts found
            </p>
        @endif
    </div>
@endsection
<div class="form-group">
    {!! Form::label('title', 'Title') !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'id' => 'title']) !!}
    @if ($errors->has('title'))
        <p class="text-danger">{{ $errors->first('title') }}</p>
    @endif
</div>
<div class="form-group">
    {!! Form::label('slug', 'Slug') !!}
    {!! Form::text('slug', null, ['class' => 'form-control', 'id' => 'slug']) !!}
    @if ($errors->has('slug'))
        <p class="text-danger">{{ $errors->first('slug') }}</p>
    @endif
</div>
<div class="form-group">
    {!! Form::label('description', 'Description') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control', 'id' => 'description']) !!}
    @if ($errors->has('description'))
        <p class="text-danger">{{ $errors->first('description') }}</p>
    @endif
</div>
<div class="form-group">
    {!! Form::label('category_id', 'Category') !!}
    {!! Form::select('category_id', $categories, null, ['class' => 'form-control', 'id' => 'category_id']) !!}
    @if ($errors->has('category_id'))
        <p class="text-danger">{{ $errors->first('category_id') }}</p>
    @endif
</div>
<div class="form-group">
    {!! Form::label('featured_image', 'Featured Image') !!}
    {!! Form::file('featured_image') !!}
    @if ($errors->has('featured_image'))
        <p class="text-danger">{{ $errors->first('featured_image') }}</p>
    @endif
</div>
<div class="form-group">
    {!! Form::label('status', 'Status') !!}
    {!! Form::select('status', getStatusOptions(), null, ['class' => 'form-control', 'id' => 'name']) !!}
    @if ($errors->has('status'))
        <p class="text-danger">{{ $errors->first('status') }}</p>
    @endif
</div>
<div class="form-group">
    {!! Form::submit('Save Changes', ['class' => 'btn btn-primary']) !!}
</div>
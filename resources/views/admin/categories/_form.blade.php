<div class="form-group">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) !!}
</div>
<div class="form-group">
    {!! Form::label('status', 'Status') !!}
    {!! Form::select('status', getStatusOptions(), null, ['class' => 'form-control', 'id' => 'name']) !!}
</div>
<div class="form-group">
    {!! Form::submit('Save Changes', ['class' => 'btn btn-primary']) !!}
</div>
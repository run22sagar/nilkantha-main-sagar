<div class="form-group {{ $errors->has('first_name') ? 'has-error' : ''}}">
    <label for="first_name" class="control-label">{{ 'First Name' }}</label>
    <input class="form-control" name="first_name" type="text" id="first_name" value="{{ old('first_name', isset($alumnus->first_name) ?  $alumnus->first_name  : '') }}" >
    {!! $errors->first('first_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('middle_name') ? 'has-error' : ''}}">
    <label for="middle_name" class="control-label">{{ 'Middle Name' }}</label>
    <input class="form-control" name="middle_name" type="text" id="middle_name" value="{{ old('middle_name', isset($alumnus->middle_name) ? $alumnus->middle_name : '') }}" >
    {!! $errors->first('middle_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('last_name') ? 'has-error' : ''}}">
    <label for="last_name" class="control-label">{{ 'Last Name' }}</label>
    <input class="form-control" name="last_name" type="text" id="last_name" value="{{ old('last_name', isset($alumnus->last_name) ? $alumnus->last_name : '') }}" >
    {!! $errors->first('last_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('batch') ? 'has-error' : ''}}">
    <label for="batch" class="control-label">{{ 'Batch' }}</label>
    <input class="form-control" name="batch" type="text" id="batch" value="{{ old('batch', isset($alumnus->batch) ? $alumnus->batch : '') }}" >
    {!! $errors->first('batch', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('current_involvement') ? 'has-error' : ''}}">
    <label for="current_involvement" class="control-label">{{ 'Current Involvement' }}</label>
    <input class="form-control" name="current_involvement" type="text" id="current_involvement" value="{{ old('current_involvement', isset($alumnus->current_involvement) ? $alumnus->current_involvement : '') }}" >
    {!! $errors->first('current_involvement', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="control-label">{{ 'Description' }}</label>
    <textarea class="ckeditor form-control" rows="5" name="description" type="textarea" id="description" >{{ old('description', isset($alumnus->description) ? $alumnus->description : '') }}</textarea>
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('image_path') ? 'has-error' : ''}}">
    <label for="image_path" class="control-label">{{ 'Image' }}</label>
    <input class="form-control" name="image_path" type="file" id="image_path" value="{{ isset($alumnus->image_path) ? $alumnus->image_path : ''}}" >
    {!! $errors->first('image_path', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>

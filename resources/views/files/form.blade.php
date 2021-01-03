<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'File Name' }}</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ old('title', isset($file->title) ? $file->title : ''}}" >
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('path') ? 'has-error' : ''}}">
    <label for="path" class="control-label">{{ 'File(s)' }}</label>
    <input class="form-control" name="path[]" type="file" id="path" value="{{ isset($file->path) ? $file->path : ''}}" multiple>
    {!! $errors->first('path', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('post_id') ? 'has-error' : ''}}">
    <label for="post_id" class="control-label">{{ 'Post' }}</label>
    <select name="post_id" class="form-control" id="post_id" >
        @foreach ($posts as $key => $value)
            <option value="{{ $key }}" {{ isset($selectedID) ? ( ( $key == $selectedID ?? '') ? 'selected' : '') : '' }}>
                {{ $value }}
            </option>
        @endforeach
    </select>
    {!! $errors->first('post_id', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>

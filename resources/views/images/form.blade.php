<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'Image Name' }}</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ old('title', isset($image->title) ? $image->title : '') }}" >
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('path') ? 'has-error' : ''}}">
    <label for="path" class="control-label">{{ 'Image' }}</label>
    <input class="form-control" name="path[]" type="file" id="path" value="{{ isset($image->path) ? $image->path : ''}}" multiple>
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

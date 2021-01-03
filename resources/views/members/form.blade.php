<div class="form-group {{ $errors->has('first_name') ? 'has-error' : ''}}">
    <label for="first_name" class="control-label">{{ 'First Name' }}</label>
    <input class="form-control" name="first_name" type="text" id="first_name" value="{{ old('first_name', isset($member->first_name) ? $member->first_name : '') }}" >
    {!! $errors->first('first_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('middle_name') ? 'has-error' : ''}}">
    <label for="middle_name" class="control-label">{{ 'Middle Name' }}</label>
    <input class="form-control" name="middle_name" type="text" id="middle_name" value="{{ old('middle_name', isset($member->middle_name) ? $member->middle_name : '') }}" >
    {!! $errors->first('middle_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('last_name') ? 'has-error' : ''}}">
    <label for="last_name" class="control-label">{{ 'Last Name' }}</label>
    <input class="form-control" name="last_name" type="text" id="last_name" value="{{ old('last_name', isset($member->last_name) ? $member->last_name : '') }}" >
    {!! $errors->first('last_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('type') ? 'has-error' : ''}}">
    <label for="type" class="control-label">{{ 'Type' }}</label>
    <select name="type" class="form-control" id="type" required onchange="toggleDepartment();">
        @foreach (json_decode('{"management": "Management", "faculty": "Faculty", "other": "Other"}', true) as $optionKey => $optionValue)
            <option value="{{ $optionKey }}" {{ (isset($member->type) && $member->type == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
        @endforeach
    </select>
    {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
</div>
<div id="designation" class="form-group {{ $errors->has('designation') ? 'has-error' : ''}}">
    <label for="designation" class="control-label">{{ 'Designation' }}</label>
    <input class="form-control" name="designation" type="text" id="designation" value="{{ old('designation', isset($member->designation) ? $member->designation : '') }}" >
    {!! $errors->first('designation', '<p class="help-block">:message</p>') !!}'education',
</div>
<div id="education" class="form-group {{ $errors->has('education') ? 'has-error' : ''}}">
    <label for="education" class="control-label">{{ 'Education' }}</label>
    <input class="form-control" name="education" type="text" id="education" value="{{ old('education', isset($member->education) ? $member->education : '') }}" >
    {!! $errors->first('education', '<p class="help-block">:message</p>') !!}
</div>
<div id="department" class="form-group {{ $errors->has('department') ? 'has-error' : ''}}">
    <label for="department" class="control-label">{{ 'Department' }}</label>
    @if( sizeof($departments) > 0 )
        <select id="department_id" name="department_id" class="form-control" id="department_id" {{ isset($member->type) ? ( $member->type === 'faculty' ? 'required' : '' ) : ''}}>
            @foreach ($departments as $key => $value)
                <option value="{{ $key }}" {{ isset($selectedID) ? ( ( $key == $selectedID ?? '') ? 'selected' : '') : '' }}>
                    {{ $value }}
                </option>
            @endforeach
        </select>
    @else
        <a href="{{ url('/departments/create') }}" class="btn btn-success btn-sm" title="Add New Department">
            <i class="fa fa-plus" aria-hidden="true"></i> Add Department
        </a>
    @endif
    {!! $errors->first('department', '<p class="help-block">:message</p>') !!}
</div>
<div id="member_image" class="form-group {{ $errors->has('image_path') ? 'has-error' : ''}}">
    <label for="image" class="control-label">{{ 'Image' }}</label>
    <input class="form-control" name="image_path" type="file" id="image" value="{{ isset($member->image_path) ? $member->image_path : ''}}" >
    {!! $errors->first('image_path', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>

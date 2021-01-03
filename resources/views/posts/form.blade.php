{{--@if($type === 'landingPage' || $type === 'aboutUs' || $type === 'news' || $type === 'events' ||--}}
{{--    $type === 'galleries' || $type === 'admission' || $type === 'courses' || $type === 'community' ||--}}
{{--    $type === 'alumni' || $type === 'nccs' )--}}
<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'Title' }}</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ old('title', isset($post->title) ? $post->title : '') }}" >
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
{{--@endif--}}
{{--@if($type === 'aboutUs' || $type === 'news' || $type === 'notices' || $type === 'community' || $type === 'nccs')--}}
{{--<div class="form-group {{ $errors->has('sub_title') ? 'has-error' : ''}}">--}}
{{--    <label for="sub_title" class="control-label">{{ 'Sub Title' }}</label>--}}
{{--    <input class="form-control" name="sub_title" type="text" id="sub_title" value="{{ isset($post->sub_title) ? $post->sub_title : ''}}" >--}}
{{--    {!! $errors->first('sub_title', '<p class="help-block">:message</p>') !!}--}}
{{--</div>--}}
{{--@endif--}}
@if($type === 'aboutUs' || $type === 'news' || $type === 'community' || $type === 'nccs' || $type === 'events')
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="control-label">{{ 'Description' }}</label>
    <textarea class="ckeditor form-control" rows="5" name="description" type="textarea" id="description" >{{ old('description', isset($post->description) ? $post->description : '') }}</textarea>

    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>
@endif
@if($type === 'landingPage' || $type === 'aboutUs' || $type === 'news' ||
    $type === 'community' || $type === 'nccs' || $type === 'events' || $type === 'notices')
<div class="form-group {{ $errors->has('image_path') ? 'has-error' : ''}}">
    <label for="image_path" class="control-label">{{ 'Image' }}</label>
    <input class="form-control" name="image_path" type="file" id="image_path" value="{{ isset($post->image_path) ? $post->image_path : ''}}" >
    {!! $errors->first('image_path', '<p class="help-block">:message</p>') !!}
</div>
@endif
@if($type === 'admission' || $type === 'courses' || $type === 'alumni' || $type === 'events' || $type === 'notices')
<div class="form-group {{ $errors->has('file_path') ? 'has-error' : ''}}">
    <label for="file_path" class="control-label">{{ 'File' }}</label>
    <input class="form-control" name="file_path" type="file" id="file_path" value="{{ isset($post->file_path) ? $post->file_path : ''}}" >
    {!! $errors->first('file_path', '<p class="help-block">:message</p>') !!}
</div>
@endif
@if($type === 'events')
    <div class="form-group {{ $errors->has('date') ? 'has-error' : ''}}">
        <label for="date" class="control-label">{{ 'Date' }}</label>
        <input class="form-control" name="date" type="date" id="date" value="{{ old('date',  isset($post->date) ? $post->date : '') }}" >
        {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
    </div>
@endif
@if($type === 'events')
    <div class="form-group {{ $errors->has('start_time') ? 'has-error' : ''}}">
        <label for="start_time" class="control-label">{{ 'Start Time' }}</label>
        <input class="form-control" name="start_time" type="time" id="start_time" value="{{ old('start_time', isset($post->start_time) ? $post->start_time : '') }}" >
        {!! $errors->first('start_time', '<p class="help-block">:message</p>') !!}
    </div>
@endif
@if($type === 'events')
    <div class="form-group {{ $errors->has('end_time') ? 'has-error' : ''}}">
        <label for="end_time" class="control-label">{{ 'End Time' }}</label>
        <input class="form-control" name="end_time" type="time" id="end_time" value="{{ old('end_time', isset($post->end_time) ? $post->end_time : '') }}" >
        {!! $errors->first('end_time', '<p class="help-block">:message</p>') !!}
    </div>
@endif
@if($type === 'events')
    <div class="form-group {{ $errors->has('location') ? 'has-error' : ''}}">
        <label for="location" class="control-label">{{ 'Location' }}</label>
        <input class="form-control" name="location" type="text" id="location" value="{{ old('location', isset($post->location) ? $post->location : '') }}" >
        {!! $errors->first('location', '<p class="help-block">:message</p>') !!}
    </div>
@endif

{{--<div class="form-group {{ $errors->has('category') ? 'has-error' : ''}}">--}}
{{--    <label for="category" class="control-label">{{ 'Category' }}</label>--}}
{{--    <select name="category" class="form-control" id="category" required>--}}
{{--        @foreach (json_decode('{"landing_page": "Landing Page", "about_us": "About Us", "news": "News", "events": "Events", "galleries": "Galleries", "admission": "Admission", "courses": "Courses", "community": "Community", "alumni": "Alumni", "nccs": "NCCS Program"}', true) as $optionKey => $optionValue)--}}
{{--            <option value="{{ $optionKey }}" {{ (isset($post->category) && $post->category == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>--}}
{{--        @endforeach--}}
{{--    </select>--}}
{{--    {!! $errors->first('category', '<p class="help-block">:message</p>') !!}--}}
{{--</div>--}}

@if($type === 'nccs')
    <div class="form-group {{ $errors->has('video_link') ? 'has-error' : ''}}">
        <label for="video_link" class="control-label">{{ 'Video Link' }}</label>
        <input class="form-control" name="video_link" type="text" id="video_link" value="{{ old('video_link', isset($post->video_link) ? $post->video_link : '') }}" >
        {!! $errors->first('video_link', '<p class="help-block">:message</p>') !!}
@endif
@if($type === 'aboutUs')
    <div class="form-group {{ $errors->has('landing_page') ? 'has-error' : ''}}">
        <label for="landing_page" class="control-label">{{ 'Landing Page' }}</label>
        <input class="form-control" name="landing_page" type="checkbox" id="landing_page" value="{{ old('landing_page', 1) }}" {{ isset($post->landing_page) ? ( $post->landing_page === '1' ? 'checked' : '') : '' }}>
        {!! $errors->first('landing_page', '<p class="help-block">:message</p>') !!}
    </div>
@endif




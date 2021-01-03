@switch($type ?? '')
    @case('landingPage')
        <input  name="category" type="hidden" id="category" value="{{ isset($post->category) ? $post->category : 'landing_page'}}" >
        @break
    @case('aboutUs')
        <input  name="category" type="hidden" id="category" value="{{ isset($post->category) ? $post->category : 'about_us'}}" >
        @break
    @case('news')
        <input  name="category" type="hidden" id="category" value="{{ isset($post->category) ? $post->category : 'news'}}" >
        @break
    @case('events')
        <input  name="category" type="hidden" id="category" value="{{ isset($post->category) ? $post->category : 'events'}}" >
        @break
    @case('notices')
        <input  name="category" type="hidden" id="category" value="{{ isset($post->category) ? $post->category : 'notices'}}" >
        @break
    @case('galleries')
        <input  name="category" type="hidden" id="category" value="{{ isset($post->category) ? $post->category : 'galleries'}}" >
        @break
    @case('admission')
        <input  name="category" type="hidden" id="category" value="{{ isset($post->category) ? $post->category : 'admission'}}" >
        @break
    @case('courses')
        <input  name="category" type="hidden" id="category" value="{{ isset($post->category) ? $post->category : 'courses'}}" >
        @break
    @case('community')
        <input  name="category" type="hidden" id="category" value="{{ isset($post->category) ? $post->category : 'community'}}" >
        @break
    @case('alumni')
        <input  name="category" type="hidden" id="category" value="{{ isset($post->category) ? $post->category : 'alumni'}}" >
        @break
    @case('nccs')
        <input  name="category" type="hidden" id="category" value="{{ isset($post->category) ? $post->category : 'nccs'}}" >
        @break
@endswitch
<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>

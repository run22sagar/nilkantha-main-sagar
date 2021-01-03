<div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
    <label for="address" class="control-label">{{ 'Address' }}</label>
    <input class="form-control" name="address" type="text" id="address" value="{{ old('address', isset($contact->address) ? $contact->address : '') }}" >
    {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
    <label for="phone" class="control-label">{{ 'Phone' }}</label>
    <input class="form-control" name="phone" type="text" id="phone" value="{{ old('phone', isset($contact->phone) ? $contact->phone : '') }}" >
    {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="control-label">{{ 'Email' }}</label>
    <input class="form-control" name="email" type="text" id="email" value="{{ old('email', isset($contact->email) ? $contact->email : '') }}" >
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('facebookPage') ? 'has-error' : ''}}">
    <label for="facebookPage" class="control-label">{{ 'Facebook Page' }}</label>
    <input class="form-control" name="facebookPage" type="text" id="facebookPage" value="{{ old('facebookPage', isset($contact->facebookPage) ? $contact->facebookPage : '') }}" >
    {!! $errors->first('facebookPage', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('instagramLink') ? 'has-error' : ''}}">
    <label for="instagramLink" class="control-label">{{ 'Instagram Link' }}</label>
    <input class="form-control" name="instagramLink" type="text" id="instagramLink" value="{{ old('instagramLink', isset($contact->instagramLink) ? $contact->instagramLink : '') }}" >
    {!! $errors->first('instagramLink', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('youtubeLink') ? 'has-error' : ''}}">
    <label for="youtubeLink" class="control-label">{{ 'Youtube Link' }}</label>
    <input class="form-control" name="youtubeLink" type="text" id="email" value="{{ old('youtubeLink', isset($contact->youtubeLink) ? $contact->youtubeLink : '') }}" >
    {!! $errors->first('youtubeLink', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('googleMapUrl') ? 'has-error' : ''}}">
    <label for="googleMapUrl" class="control-label">{{ 'Google Map Ember URL' }}</label>
    <input class="form-control" name="googleMapUrl" type="text" id="googleMapUrl" value="{{ old('googleMapUrl', isset($contact->googleMapUrl) ? $contact->googleMapUrl : '') }}" >
    {!! $errors->first('googleMapUrl', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>

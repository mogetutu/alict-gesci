@extends('layouts.scaffold')

@section('main')
<div class="row">
<div class="panel panel-warning">
<div class="panel-heading">
  Create Profile
</div>
<div class="panel-body">
<p>Please ensure that you include your name as it appears on your passport</p>
{{ Form::open(array('route' => 'profiles.store')) }}
  <div class="form-group">
    {{ Form::label('firstname', 'First name:') }}
    {{ Form::text('firstname', Input::old('firstname'), ['class' => 'form-control']) }}
  </div>

  <div class="form-group">
    {{ Form::label('lastname', 'Last name:') }}
    {{ Form::text('lastname', Input::old('lastname'), ['class' => 'form-control']) }}
  </div>

  <div class="form-group">
    {{ Form::label('country', 'Country:') }}
    {{ Form::select('country', Country::$countries, Input::old('country'), ['class' => 'form-control']) }}
  </div>

  <div class="form-group">
    {{ Form::label('gender', 'Gender:') }}
    {{ Form::select('gender', ['Female', 'Male'], Input::old('gender'), ['class' => 'form-control']) }}
  </div>

  <div class="form-group">
    {{ Form::label('dob', 'Date of Birth:') }}
    {{Form::selectYear('year', 1950, 1992)}}
    {{Form::selectMonth('month')}}
    {{Form::selectRange('day', 1, 30)}}
  </div>

  <div class="form-group">
    {{ Form::label('nationality', 'Nationality:') }}
    {{ Form::text('nationality', Input::old('nationality'), ['class' => 'form-control']) }}
  </div>

  <div class="form-group">
    {{ Form::label('workaddress', 'Workplace address:') }}
    {{ Form::text('workaddress', Input::old('workaddress'), ['class' => 'form-control']) }}
  </div>

  <div class="form-group">
    {{ Form::label('email', 'Secondary Email:') }}
    {{ Form::text('email', Input::old('email'), ['class' => 'form-control']) }}
  </div>

  <div class="form-group">
    {{ Form::label('mobile', 'Mobile: (include country code pre-fix with +)') }}
    {{ Form::text('mobile', Input::old('mobile'), ['class' => 'form-control', 'placeholder' => 'Include country Prefix eg +254...']) }}
  </div>

  <div class="form-group">
    {{ Form::label('passport', 'Passport Number:') }}
    {{ Form::text('passport', Input::old('passport'), ['class' => 'form-control']) }}
  </div>

  <div class="form-group">
    {{ Form::submit('Create Profile', array('class' => 'btn btn-primary')) }}
  </div>
{{ Form::close() }}
</div>
</div>
</div>

<div class="well">
  <p class="lead">**Please ensure that the email addresses that you provide are correct and functioning. Ensure that the primary email address you provide is the email address you wish us to use when corresponding with you on all matters related to this application and to the ALICT course.</p>
</div>

@stop



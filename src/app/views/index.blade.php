@extends('layouts.master')
@section('metaDescription')
   Kansas City web development artisans.
@stop

@section('metaKeywords')
    kansas city web development, web programming, website, website design, php developers
@stop

@section('pageTitle')
    Kansas City Web Development, by the nerds.
@stop

@section('navbar')
    @parent
@stop

@section('masthead')
	<div class="banner">
		<span class="heading">Kansas City Web Development</span>
		<span class="sub-heading">done by the nerds.</span>
	</div>
@stop
@section('content')
	<div class="content">
		<h1>Get your stuff done by the nerds.</h1>
		{{ Form::open(array('url'=>'/quickquote', 'id'=>'quickquote', 'role'=>'form', 'class'=>'form')) }}
		<div class="row steps">
			<div class="col-md-4">
				<h3>Step One <span class="glyphicon glyphicon-ok success-color need-check hidden"></span></h3>
				{{ Form::select('primary_need', array('blank'=>'Primary Need', 'new_site'=>'New Site', 'site_design'=>'Basic Site Design', 'rebranding'=>'Company Rebranding', 'consulting'=>'Consultation', 'hack'=>'Penetration Tests'), null, array('class'=>'primary-need form-control')) }}
			</div>
			<div class="col-md-4">
				<h3>Step Two <span class="glyphicon glyphicon-ok success-color price-check hidden"></span></h3>
				{{ Form::select('price_range', array('blank'=>'Select a price range', 'range1'=>'$0.00 - $50.00', 'range2'=>'$50.00 - $100.00', 'range3'=>'$100.00 - $250.00', 'range4' => '$250.00 - $500.00', 'range5'=>'$500.00 - $1,000.00', 'range6' => '$1,000.00 +'), null, array('class'=>'price-range form-control', 'disabled'=>'disabled')) }}
			</div>
			<div class="col-md-4">
				<h3>Step Three {{ Form::submit('Get a Quote', array('class'=>'btn btn-primary submit-quote hidden')); }}</span></h3>
				{{ Form::input('date_needed', null, null, array('class'=>'date-needed form-control', 'placeholder'=>'Date Needed', 'disabled'=>'disabled')) }}
			</div>
		</div>
		{{ Form::close() }}
	</div>
@stop
@section('contactModal')
	@parent
@stop
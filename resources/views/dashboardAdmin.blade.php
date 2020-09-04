@extends('layout.mainlayout')

@section('title','Dashboard')

@section('content')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
  </div>

  <div class="row" style="margin-top: 1.5rem;">

  	
  	<div class="col-lg-6 col-6">
  	<div class="card text-white bg-success mb-3" style="border-radius: 0.5rem;">
	  <div class="card-body" style="padding: 2rem 0 0 0;">
	  	<div style="text-align: center;">
	    	<i class="fa fa-tablet" id="cardIcon" style="background-color: #165d2c"></i>
	  	</div>
	    <h5 class="card-text" style="text-align: center;">Total Devices</h5>
	    <p style="text-align: center;">{{ $totalDevice }}</p>
	  </div>
		  <div class="detail-section">
	    	<a href="{{ url('devices') }}"><i class="fa fa-info-circle"></i> More Info</a>
		  </div>
	</div>
  	</div>
 	<div class="col-lg-6 col-6">
  	<div class="card text-white bg-danger mb-3" style="border-radius: 0.5rem;">
	  <div class="card-body" style="padding: 2rem 0 0 0;">
	  	<div style="text-align: center;">
	    	<i class="fa fa-user" id="cardIcon" style="background-color: #692222"></i>
	  	</div>
	    <h5 class="card-text" style="text-align: center;">Total User</h5>
	    <p style="text-align: center;">{{ $totalUser }}</p>
	  </div>
		  <div class="detail-section">
	    	<a href="{{ url('users') }}"><i class="fa fa-info-circle"></i> More Info</a>
		  </div>
	</div>
  	</div>
	  <div class="col-lg-6 col-6">
  	<div class="card text-white bg-info mb-3" style="border-radius: 0.5rem;">
	  <div class="card-body" style="padding: 2rem 0 0 0;">
	  	<div style="text-align: center;">
	    	<i class="fa fa-building" id="cardIcon" style="background-color: #1d6580"></i>
	  	</div>
	    <h5 class="card-text" style="text-align: center;">Total Gedung</h5>
	    <p style="text-align: center;">{{ $totalGedung }}</p>
	  </div>
		  <div class="detail-section">
	    	<a href="{{ url('gedung') }}"><i class="fa fa-info-circle"></i> More Info</a>
		  </div>
	</div>
  	</div>
	  <div class="col-lg-6 col-6">
  	<div class="card text-white bg-warning mb-3" style="border-radius: 0.5rem;">
	  <div class="card-body" style="padding: 2rem 0 0 0;">
	  	<div style="text-align: center;">
	    	<i class="fa fa-bed" id="cardIcon" style="background-color: #967100"></i>
	  	</div>
	    <h5 class="card-text" style="text-align: center;">Total Ruang</h5>
	    <p style="text-align: center;">{{ $totalRuang }}</p>
	  </div>
		  <div class="detail-section">
	    	<a href="{{ url('ruang') }}"><i class="fa fa-info-circle"></i> More Info</a>
		  </div>
	</div>
  	</div>
	</div>

@endsection
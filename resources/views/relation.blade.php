@extends('layout.mainlayout')

@section('title','Relation')

@section('content')
	
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Active Device</h1>
  </div>
	<table class="table table-bordered" style="text-align: center;" id="relation_list">
	  <thead>
	    <tr>
	      <th scope="col">No.</th>
		  <th scope="col">Fakultas</th>
	      <th scope="col">Gedung</th>
	      <th scope="col">Lantai</th>
	      <th scope="col">Ruang</th>
	      <th scope="col">ID Device</th>
		  <th scope="col">Status</th>
	    </tr>
	  </thead>
	  <?php 
	  	$no=1;
	  ?>
	  <tbody>
	  @foreach($listJoin as $list)
	    <tr>
			<th scope="row">{{ $no }}</th>
			<td >{{ $list['keterangan'] }}</td>
			<td>GEDUNG {{ $list['gedung'] }}</td>
			<td>LANTAI {{ $list['lantai'] }}</td>
			<td style="text-transform: uppercase;"> RUANG {{ $list['ruang'] }}</td>
			<td>{{ $list['id'] }}</td>
			<td style="text-transform: uppercase;">{{ $list['status'] }}</td>
	    </tr>
	  <?php
	  	$no++;
	  ?>
	  @endforeach
	  </tbody>
	</table>

@endsection

@section('additionalScripts')
	
	<script>
		var table = $('#relation_list').DataTable();
	</script>

@endsection
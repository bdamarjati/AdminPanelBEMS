@extends('layout.mainlayout')

@section('title','Device')

@section('content')
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	    <h1 class="h2">Devices</h1>
	</div>
	
	<button type="button" class="btn btn-info btn-block" style="margin-bottom: 1rem;" data-toggle="modal" data-target="#deviceAdd">Add New Device</button>
	
	<table class="table table-bordered" style="text-align: center;" id="device_list">
	  <thead>
	    <tr>
			<th scope="col">ID Device</th>
			<th scope="col">Ruang</th>
			<th scope="col">Status</th>
			<th scope="col">Action</th>
	    </tr>
	  </thead>
	</table>

	<div class="modal fade" id="deviceAdd" tabindex="-1" role="dialog" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered">
	    <div class="modal-content">
	      <div class="modal-header" style="border: none;">
	        <h5 class="modal-title" id="deviceaddTitle">Add New Device</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">

	        <form method="post" id="formAdd">
	        	{{ csrf_field() }}
	    	  <div class="form-group">
			    <label for="id">ID Device</label>
			    <input type="text" class="form-control" name="id" id="id" aria-describedby="emailHelp" placeholder="Enter ID Device" required="">
			  </div>
			  <div class="form-group">
			    <label for="id_ref_ruang">Ruang</label>
			        <select class="form-control" id="id_ref_ruang" name="id_ref_ruang" style="text-transform: uppercase;">
						@foreach($ruangInfo as $info)
					      <option value="{{ $info['id'] }}">{{ $info['id'] }} - Ruang {{ $info['ruang'] }}</option>
						@endforeach
				    </select>
			  </div>
			  <button type="submit" class="btn btn-primary" style="float: right;" id="saveBtn">Submit</button>
	        </form>
			
	      </div>
	    </div>
	  </div>
	</div>

	<div class="modal fade" id="deviceEdit" tabindex="-1" role="dialog" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered">
	    <div class="modal-content">
	      <div class="modal-header" style="border: none;">
	        <h5 class="modal-title" id="deviceEditTitle">Edit Device</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form method="post" id="formEdit">
	        	{{ csrf_field() }}
				<!--
	    		<div class="form-group">
					<label for="id">ID Device</label>
			    	<input type="text" class="form-control" name="idDeviceEdit" id="idDeviceEdit" aria-describedby="emailHelp" placeholder="Enter ID Device" required="">
				</div>
				-->
			  <div class="form-group">
			    <label for="idDeviceEdit">Ruang</label>
			        <select class="form-control" id="idDeviceEdit" name="idDeviceEdit" style="text-transform: uppercase;">
						@foreach($ruangInfo as $info)
					      <option value="{{ $info['id'] }}">{{ $info['id'] }} - Ruang {{ $info['ruang'] }}</option>
						@endforeach
				    </select>
			  </div>
			  <!--
	    	  <div class="form-group">
			    <label for="name">ID Gedung - Gedung</label>
			     <select class="form-control" id="idBuildingEdit" name="idBuildingEdit" style="text-transform: uppercase;">
				    @foreach($ruangInfo as $info)
				      <option value="{{ $info['id'] }}">{{ $info['id'] }} - Ruang {{ $info['ruang'] }}</option>
					@endforeach
				</select>
			  </div>
			  -->
			  <button type="submit" class="btn btn-primary" style="float: right;" id="saveBtn2">Save Changes</button>
	        </form>
			
	      </div>
	    </div>
	  </div>
	</div>

	<div class="modal fade" id="deleteConfirmation" tabindex="-1" role="dialog" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header" style="border: none;">
	        <h5 class="modal-title" id="deleteConfirmationTitle">Delete Device</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        Are you sure you want to delete this device?
	      </div>
	      <div class="modal-footer" style="border: none;">
		    <button type="button" class="btn btn-danger" id="deleteConfirmBtn">Confirm</button>
	      </div>
	    </div>
	  </div>
	</div>

	<div class="modal fade" id="infoId" tabindex="-1" role="dialog" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered">
	    <div class="modal-content">
	      <div class="modal-header" style="border: none;">
	        <h5 class="modal-title" id="deviceEditTitle">Gedung Details</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body" style="text-align: center;">
	    	  <div class="form-group">
			    <label for="name">ID Gedung</label>
			    <input type="text" class="form-control" name="idBuildingInfo" id="idBuildingInfo" placeholder="Enter ID" required="" disabled="" style="text-align: center;">
			  </div>
			  <div class="form-group">
			    <label for="name">ID User</label>
			    <input type="text" class="form-control" name="idUserInfo" id="idUserInfo" placeholder="Enter ID" required="" disabled="" style="text-align: center;">
			  </div>
			  <div class="form-group">
			    <label for="name">Gedung</label>
			    <input type="text" class="form-control" name="buildingInfo" id="buildingInfo" placeholder="Enter ID" required="" disabled="" style="text-align: center;">
			  </div>
			  <div class="form-group">
			    <label for="name">Keterangan</label>
			    <input type="text" class="form-control" name="keteranganInfo" id="keteranganInfo" placeholder="Enter ID" required="" disabled="" style="text-align: center; text-transform: uppercase;">
			  </div>
	      </div>
	    </div>
	  </div>
	</div>



@endsection

@section('additionalScripts')
	<script>
		toastr.options= {
		  "preventDuplicates": true,
          "timeOut": "1000",
          "showEasing": "swing",
		  "hideEasing": "linear",
		  "showMethod": "fadeIn",
		  "hideMethod": "fadeOut"
		}
	</script>
	<script>
			
		var table = $('#device_list').DataTable({
			ajax: '{{ url('api/getDevice') }}',
			columns: [
				{data: 'id' , name: 'id'},
				{data: 'ruang' , name: 'ruang',
				 fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
		            if(oData.ruang) {
		                $(nTd).html("<a style='text-transform: uppercase;'> RUANG "+oData.ruang+"</a>");
			            }
			        }
				},
				{data: 'status' , name: 'status',
				 fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
		            if(oData.status) {
		                $(nTd).html("<a style='text-transform: uppercase;'>"+oData.status+"</a>");
			            }
			        }
				},
				{  mRender: function (data, type, row) {
	                return '<a title="Edit Device" id="editBtn" data-id= '+row['id']+' style="color: #8c4411; cursor: pointer;" data-toggle="modal" data-target="#deviceEdit"><i class="fa fa-edit fa-lg"></i></a> '
	                + '|' +
	                ' <a title="Delete Device" id="deleteBtn" data-id=' + row['id'] + ' style="cursor: pointer;"><i class="fa fa-times fa-lg" style="color: #d82929"></i></a>'
		            }, orderable: false
		         }
			]
		});	

		$("#saveBtn").click(function(e){
			e.preventDefault();
			$(this).html('Submitting..');
			console.log($('#formAdd').serialize());
			$.ajax({
				type: 'POST',
				url: 'device/add',
				data: $('#formAdd').serialize(),
				success: function(data){
					$('#formAdd').trigger('reset');
					$('#deviceAdd').modal('hide');
					$('#saveBtn').html('Submit');
					toastr.success('User Successfully Created!');
					table.ajax.reload();
				},
			})
		});

		$(document).on('click','#idRefGedung',function(e){
			e.preventDefault();
			var id = $(this).attr('data-id');
			$.ajax({
				url: 'api/device/info/'+id,
				success: function(data){
					console.log(data);
					$('#idBuildingInfo').val(data.id);
					$('#idUserInfo').val(data.id_ref_users);
					$('#buildingInfo').val(data.gedung);
					$('#keteranganInfo').val(data.keterangan);
				}
			})
		})

		$(document).on('click','#deleteBtn',function(e){
			e.preventDefault();
			$('#deleteConfirmation').modal('show');
			var id = $(this).attr('data-id');
			$('#deleteConfirmBtn').click(function(e){
				e.preventDefault();
				$(this).html('Deleting..');
				$.ajax({
					url: 'device/delete/'+id,
					success: function(data){
						$('#deleteConfirmation').modal('hide');
						$('#deleteConfirmBtn').html('Confirm');
						table.ajax.reload();
						toastr.success('User Successfully Deleted!');
					}
				})
			})
		});

		$(document).on('click','#editBtn',function(e){
			var id = $(this).attr('data-id');
			$.ajax({
				url: 'api/device/edit/'+id,
				success: function(data){
					console.log(data);
					$('#idDeviceEdit').val(data.id_ref_ruang);
				}
			});
			$("#saveBtn2").click(function(e){
				e.preventDefault();
				$(this).html('Saving..');
				console.log($('#formEdit').serialize());
				console.log(id);
				$.ajax({
					type: 'POST',
					url: 'device/update/'+id,
					data: $('#formEdit').serialize(),
					success: function(data){
						$('#formEdit').trigger('reset');
						$('#deviceEdit').modal('hide');
						$('#saveBtn2').html('Save Changes');
						toastr.success('Data Successfully Updated!');
						table.ajax.reload();
					}
				})
			})
		});

	</script>
@endsection
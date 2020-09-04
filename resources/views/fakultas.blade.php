@extends('layout.mainlayout')

@section('title','Fakultas')

@section('content')

	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	    <h1 class="h2">Fakultas</h1>
	</div>

	<button type="button" class="btn btn-info btn-block" style="margin-bottom: 1rem;" data-toggle="modal" data-target="#buildingAdd">Add New Fakultas</button>

	<table class="table table-bordered" style="text-align: center;" id="fakultas_list">
	  <thead>
	    <tr>
	      <th scope="col">ID Fakultas</th>
	      <th scope="col">Keterangan</th>
	      <th scope="col">Action</th>
	    </tr>
	  </thead>
	</table>

	<div class="modal fade" id="buildingAdd" tabindex="-1" role="dialog" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered">
	    <div class="modal-content">
	      <div class="modal-header" style="border: none;">
	        <h5 class="modal-title" id="buildingaddTitle">Add New Fakultas</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">

	        <form method="post" id="formAdd">
	        	{{ csrf_field() }}
	    	  <div class="form-group">
			    <label for="id">ID Fakultas</label>
			    <input type="text" class="form-control" name="id" id="id" placeholder="Enter ID Fakultas" required="" value="{{ $getId['id']+1}}">
			  </div>
			  <div class="form-group">
			    <label for="keterangan">Keterangan</label>
			    <input type="text" class="form-control" name="keterangan" id="keterangan" aria-describedby="emailHelp" placeholder="Enter Keterangan" required="">
			  </div>
			  <button type="submit" class="btn btn-primary" style="float: right;" id="saveBtn">Submit</button>
	        </form>
			
	      </div>
	    </div>
	  </div>
	</div>

	<div class="modal fade" id="buildingEdit" tabindex="-1" role="dialog" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered">
	    <div class="modal-content">
	      <div class="modal-header" style="border: none;">
	        <h5 class="modal-title" id="buildingEditTitle">Edit Fakultas</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form method="post" id="formEdit">
	        	{{ csrf_field() }}
			  <div class="form-group">
			    <label for="keterangan">Keterangan</label>
			    <input type="text" class="form-control" name="fakultasEdit" id="fakultasEdit" aria-describedby="emailHelp" placeholder="Enter Fakultas" required="">
			  </div>
              
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
	        <h5 class="modal-title" id="deleteConfirmationTitle">Delete Fakultas</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        Are you sure you want to delete this gedung?
	      </div>
	      <div class="modal-footer" style="border: none;">
		    <button type="button" class="btn btn-danger" id="deleteConfirmBtn">Confirm</button>
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

		var table = $('#fakultas_list').DataTable({
			ajax: "{{ url('api/getFakultas') }}",
			columns: [
				{data: 'id' , name: 'id'},
				{data: 'keterangan' , name: 'keterangan',
				 fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
		            if(oData.keterangan) {
		                $(nTd).html("<a style='text-transform: uppercase;'>"+oData.keterangan+"</a>");
			            }
			        }
				},
				{  mRender: function (data, type, row) {
		                return '<a title="Edit Building" id="editBtn" data-id= '+row['id']+' style="color: #8c4411; cursor: pointer;" data-toggle="modal" data-target="#buildingEdit"><i class="fa fa-edit fa-lg"></i></a> '
		                + '|' +
		                ' <a title="Delete Building" id="deleteBtn" data-id=' + row['id'] + ' style="cursor: pointer;"><i class="fa fa-times fa-lg" style="color: #d82929"></i></a>'
		            }, orderable: false
		         }
			]
		});

		$(document).on('click','#saveBtn', function(e){
			e.preventDefault();
			$(this).html('Submitting..');
			console.log($('#formAdd').serialize());
			$.ajax({
				type: 'POST',
				url: 'fakultas/add',
				data: $('#formAdd').serialize(),
				success: function(data){
					$('#formAdd').trigger('reset');
					$('#facultyAdd').modal('hide');
					$('#saveBtn').html('Submit');
					toastr.success('Fakultas Successfully Created!');
					table.ajax.reload();
				},
			})
		});

		$(document).on('click','#deleteBtn',function(e){
			e.preventDefault();
			$('#deleteConfirmation').modal('show');
			var id = $(this).attr('data-id');
			$('#deleteConfirmBtn').click(function(e){
				e.preventDefault();
				$(this).html('Deleting..');
				console.log(id);
				$.ajax({
					url: 'fakultas/delete/'+id,
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
				url: 'api/fakultas/edit/'+id,
				success: function(data){
					$('#fakultasEdit').val(data.keterangan);
				}
			});
			$("#saveBtn2").click(function(e){
				e.preventDefault();
				$(this).html('Saving..');
				console.log($('#formEdit').serialize());
				$.ajax({
					type: 'POST',
					url: 'fakultas/update/'+id,
					data: $('#formEdit').serialize(),
					success: function(data){
						$('#formEdit').trigger('reset');
						$('#fakultasEdit').modal('hide');
						$('#saveBtn2').html('Save Changes');
						toastr.success('Data Successfully Updated!');
						table.ajax.reload();
					}
				})
			})
		});
		
	</script>

@endsection
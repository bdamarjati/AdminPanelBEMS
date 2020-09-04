@extends('layout.mainlayout')

@section('title','Lantai')

@section('content')

	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	    <h1 class="h2">Lantai</h1>
	</div>

	<button type="button" class="btn btn-info btn-block" style="margin-bottom: 1rem;" data-toggle="modal" data-target="#buildingAdd">Add New Lantai</button>

	<table class="table table-bordered" style="text-align: center;" id="building_list">
	  <thead>
	    <tr>
	      <th scope="col">ID Lantai</th>
		  <th scope="col">ID Gedung</th>
	      <th scope="col">Lantai</th>
	      <th scope="col">Action</th>
	    </tr>
	  </thead>
	</table>

	<div class="modal fade" id="buildingAdd" tabindex="-1" role="dialog" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered">
	    <div class="modal-content">
	      <div class="modal-header" style="border: none;">
	        <h5 class="modal-title" id="buildingaddTitle">Add New Lantai</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">

	        <form method="post" id="formAdd">
	        	{{ csrf_field() }}
	    	  <div class="form-group">
			    <label for="id">ID Lantai</label>
			    <input type="text" class="form-control" name="id" id="id" placeholder="Enter ID Lantai" required="" value="{{ $getNextId['id'] +1 }}" disabled="">
			  </div>
			  <div class="form-group">
			    <label for="id_ref_gedung">Gedung - Fakultas</label>
			        <select class="form-control" id="id_ref_gedung" name="id_ref_gedung" style="text-transform: uppercase;">
						@foreach($fakultasInfo as $info)
						  @if($info['id'] != 0)
						      <option value="{{ $info['id'] }}">Gedung {{ $info['gedung'] }} - {{ $info['keterangan'] }}</option>
					      @endif
						@endforeach
				    </select>
			  </div>
			  <div class="form-group">
			    <label for="lantai">Lantai</label>
			    <input type="text" class="form-control" name="lantai" id="lantai" aria-describedby="emailHelp" placeholder="Enter Lantai" required="">
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
	        <h5 class="modal-title" id="buildingEditTitle">Edit Lantai</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form method="post" id="formEdit">
	        	{{ csrf_field() }}
	    	  <div class="form-group">
			    <label for="id">Gedung - Fakultas</label>
			     <select class="form-control" id="idGedungEdit" name="idGedungEdit" style="text-transform: uppercase;">
				    @foreach($fakultasInfo as $info)
				      <option value="{{ $info['id'] }}">Gedung {{ $info['gedung'] }} - {{ $info['keterangan'] }}</option>
					@endforeach
				</select>
			  </div>
			  <div class="form-group">
			    <label for="lantai">Lantai</label>
			    <input type="text" class="form-control" name="lantaiEdit" id="lantaiEdit" aria-describedby="emailHelp" placeholder="Enter Lantai" required="">
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
	        <h5 class="modal-title" id="deleteConfirmationTitle">Delete Lantai</h5>
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

	<div class="modal fade" id="infoId" tabindex="-1" role="dialog" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered">
	    <div class="modal-content">
	      <div class="modal-header" style="border: none;">
	        <h5 class="modal-title" id="buldingEditTitle">Gedung Details</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body" style="text-align: center;">

	    	  <div class="form-group">
			    <label for="name">ID Gedung</label>
			    <input type="text" class="form-control" name="idGedungInfo" id="idGedungInfo" placeholder="Enter ID" required="" disabled="" style="text-align: center;">
			  </div>
			  <div class="form-group">
			    <label for="name">Gedung</label>
			    <input type="text" class="form-control" name="nameInfo" id="nameInfo" placeholder="Enter Name" required="" disabled="" style="text-align: center;">
			  </div>
              <div class="form-group">
			    <label for="name">Fakultas</label>
			    <input type="text" class="form-control" name="nameFakultasInfo" id="nameFakultasInfo" placeholder="Enter Name" required="" disabled="" style="text-align: center;">
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

		var table = $('#building_list').DataTable({
			ajax: "{{ url('api/getLantai') }}",
			columns: [
				{data: 'id' , name: 'id'},
				{data: 'id_ref_gedung' , name: 'id_ref_gedung',
				 fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
		            if(oData.id_ref_gedung) {
		                $(nTd).html("<a href='#' data-id-gedung='"+oData.id_ref_gedung+"' data-toggle='modal' data-target='#infoId' id='idRefUsers'>"+oData.id_ref_gedung+"</a>");
			            }
			        }
			    },
				{data: 'lantai' , name: 'lantai',
				fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
			            if(oData.lantai) {
			                $(nTd).html("<a style='text-transform: uppercase;'> LANTAI "+oData.lantai+"</a>");
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
				url: 'lantai/add',
				data: $('#formAdd').serialize(),
				success: function(data){
					$('#formAdd').trigger('reset');
					$('#buildingAdd').modal('hide');
					$('#saveBtn').html('Submit');
					toastr.success('Lantai Successfully Created!');
					table.ajax.reload();
				},
			})
		});
	

		$(document).on('click','#idRefUsers',function(e){
			e.preventDefault();
			var id = $(this).attr('data-id-gedung');
			$.ajax({
				url: 'api/lantai/info/'+id,
				success: function(data){
					console.log(data);
					$('#idGedungInfo').val(data.id_ref_gedung);
					$('#nameInfo').val("GEDUNG "+data.gedung);
                    $('#nameFakultasInfo').val(data.keterangan);
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
				console.log(id);
				$.ajax({
					url: 'lantai/delete/'+id,
					success: function(data){
						$('#deleteConfirmation').modal('hide');
						$('#deleteConfirmBtn').html('Confirm');
						table.ajax.reload();
						toastr.success('Lantai Successfully Deleted!');
					}
				})
			})
		});

		$(document).on('click','#editBtn',function(e){
			var id = $(this).attr('data-id');
			$.ajax({
				url: 'api/lantai/edit/'+id,
				success: function(data){
					$('#idUserEdit').val(data.id_ref_gedung);
					$('#gedungEdit').val(data.lantai);
				}
			});
			$("#saveBtn2").click(function(e){
				e.preventDefault();
				$(this).html('Saving..');
				console.log($('#formEdit').serialize());
				$.ajax({
					type: 'POST',
					url: 'lantai/update/'+id,
					data: $('#formEdit').serialize(),
					success: function(data){
						$('#formEdit').trigger('reset');
						$('#buildingEdit').modal('hide');
						$('#saveBtn2').html('Save Changes');
						toastr.success('Data Successfully Updated!');
						table.ajax.reload();
					}
				})
			})
		});
		
	</script>

@endsection
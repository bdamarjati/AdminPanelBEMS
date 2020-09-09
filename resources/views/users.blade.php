@extends('layout.mainlayout')

@section('title','Users')

@section('content')
	
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">User</h1>
  </div>

  <button type="button" class="btn btn-info btn-block" style="margin-bottom: 1rem;" data-toggle="modal" data-target="#userAdd">Add New User</button>

  <table class="table table-bordered" style="text-align: center;" id="user_list">
	  <thead>
	    <tr>
	      <th scope="col">ID</th>
		  <th scope="col">ID Fakultas</th>
	      <th scope="col">Name</th>
	      <th scope="col">Email</th>
	      <th scope="col">Action</th>
	    </tr>
	  </thead>
	</table>
	

<div class="modal fade" id="userAdd" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="border: none;">
        <h5 class="modal-title" id="userAddTitle">Add New User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" id="formAdd">
        	{{ csrf_field() }}
    	  <div class="form-group">
		    <label for="name">Full Name</label>
		    <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter name" required="">
		  </div>
		  <div class="form-group">
		    <label for="email">Email address</label>
		    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email" required="">
		  </div>
		  <div class="form-group">
		    <label for="faculty">Faculty</label>
		    <input type="text" class="form-control" name="faculty" id="faculty" aria-describedby="emailHelp" placeholder="Enter faculty" required="">
		  </div>
		  <div class="form-group">
		    <label for="password" style="font-weight: bold;">Password: default</label>
		  </div>
		  <button type="submit" class="btn btn-primary" style="float: right;" id="saveBtn">Submit</button>
        </form>
		
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="userEdit" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="border: none;">
        <h5 class="modal-title" id="userEditTitle">Edit User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" id="formEdit">
        	{{ csrf_field() }}
    	  <div class="form-group">
		    <label for="name">Full Name</label>
		    <input type="text" class="form-control" name="name" id="nameEdit" placeholder="Enter name" required="">
		  </div>
		  <div class="form-group">
		    <label for="email">Email address</label>
		    <input type="email" class="form-control" name="email" id="emailEdit" placeholder="Enter email" required="">
		  </div>		  
		  <button type="submit" class="btn btn-primary" style="float: right;" id="saveBtn2">Save Changes</button>
        </form>
		
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="resetConfirmation" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="border: none;">
        <h5 class="modal-title" id="resetConfirmationTitle">Reset Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to reset the password?
      </div>
      <div class="modal-footer" style="border: none;">
	    <button type="button" class="btn btn-danger" id="resetConfirmBtn">Confirm</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="deleteConfirmation" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="border: none;">
        <h5 class="modal-title" id="deleteConfirmationTitle">Delete User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this user?
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
	        <h5 class="modal-title" id="buldingEditTitle">Faculty Details</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body" style="text-align: center;">
	    	  <div class="form-group">
			    <label for="name">ID Fakultas</label>
			    <input type="text" class="form-control" name="idUserInfo" id="idUserInfo" placeholder="Enter ID" required="" disabled="" style="text-align: center;">
			  </div>
			  <div class="form-group">
			    <label for="name">Keterangan</label>
			    <input type="text" class="form-control" name="nameInfo" id="nameInfo" placeholder="Enter Name" required="" disabled="" style="text-align: center;">
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
		var table = $('#user_list').DataTable({
			ajax: "{{ url('api/getUser') }}",
			columns: [
				{data: 'id' , name: 'id'},
				{data: 'id_ref_fakultas' , name: 'id_ref_fakultas',
				 fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
		            if(oData.id_ref_fakultas) {
		                $(nTd).html("<a href='#' data-id='"+oData.id_ref_fakultas+"' data-toggle='modal' data-target='#infoId' id='idRefUsers'>"+oData.id_ref_fakultas+"</a>");
			            }
			        }
			    },
				{data: 'name' , name: 'name', orderable: false},
				{data: 'email' , name: 'email', orderable: false},
				{  mRender: function (data, type, row) {
		            if(row['id'] == '1'){
		              return 'SUPERADMIN'
		            }else{
		                return '<a title="Edit User" id="editBtn" data-id= '+row['id']+' style="color: #8c4411; cursor: pointer;" data-toggle="modal" data-target="#userEdit"><i class="fa fa-edit fa-lg"></i></a> '
		                + '|' +
		                ' <a title="Forgot Password" id="forgotPass" data-id=' + row['id'] + '><i class="fa fa-unlock-alt fa-lg" style="color: blue; cursor: pointer;"></i></a> '
		                + '|' +
		                ' <a title="Delete User" id="deleteBtn" data-id=' + row['id'] + ' style="cursor: pointer;"><i class="fa fa-times fa-lg" style="color: #d82929"></i></a>'
		              }
		            }, orderable: false
		         }
			]
		});


		$("#saveBtn").click(function(e){
			e.preventDefault();
			$(this).html('Submitting..');
			$.ajax({
				type: 'POST',
				url: 'user/add',
				data: $('#formAdd').serialize(),
				success: function(data){
					$('#formAdd').trigger('reset');
					$('#userAdd').modal('hide');
					$('#saveBtn').html('Submit');
					toastr.success('User Successfully Created!');
					table.ajax.reload();
				}
			})
		});

        $(document).on('click','#idRefUsers',function(e){
			e.preventDefault();
			var id = $(this).attr('data-id');
			$.ajax({
				url: 'api/gedung/info/'+id,
				success: function(data){
					console.log(data);
					$('#idUserInfo').val(data.id);
					$('#nameInfo').val(data.keterangan);
				}
			})
		})

		$(document).on('click','#forgotPass',function(e){
			e.preventDefault();
			$('#resetConfirmation').modal('show');
			var id = $(this).attr('data-id');
			$('#resetConfirmBtn').click(function(e){
				e.preventDefault();
				$(this).html('Reseting..');
				$.ajax({
					url: 'user/reset/'+id,
					success: function(data){
						$('#resetConfirmation').modal('hide');
						$('#resetConfirmBtn').html('Confirm');
						toastr.success('Password has been Reset Successfully!');
					}
				})
			})
		});

		$(document).on('click','#deleteBtn',function(e){
			e.preventDefault();
			$('#deleteConfirmation').modal('show');
			var id = $(this).attr('data-id');
			$('#deleteConfirmBtn').click(function(e){
				e.preventDefault();
				$(this).html('Deleting..');
				$.ajax({
					url: 'user/delete/'+id,
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
				url: 'api/user/edit/'+id,
				success: function(data){
					$('#nameEdit').val(data.name);
					$('#emailEdit').val(data.email);
				}
			});
			$("#saveBtn2").click(function(e){
				e.preventDefault();
				$(this).html('Saving..');
				$.ajax({
					type: 'POST',
					url: 'user/update/'+id,
					data: $('#formEdit').serialize(),
					success: function(data){
						$('#formEdit').trigger('reset');
						$('#userEdit').modal('hide');
						$('#saveBtn2').html('Save Changes');
						toastr.success('Data Successfully Updated!');
						table.ajax.reload();
					}
				})
			})
		});
		
	</script>

@endsection
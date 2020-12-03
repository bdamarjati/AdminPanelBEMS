<!DOCTYPE html>
<html style="padding: 0">
<head>
  
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>BEMS Admin Panel - @yield('title')</title>
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="{{asset('css/dashboard.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/adminPanel.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

</head>
<body>
	<nav class="navbar navbar-dark fixed-top p-0" style="background-color: #59CBE8;">
      <a class="navbar-brand col-9 col-sm-3 col-md-2 col-lg-11 mr-0" href="{{ url('dashboard/admin') }}">BEMS ADMIN PANEL</a>
        <a class="navbar-brand mr-0 col-3 col-lg-1 dropdown dropdown-toggle" data-toggle="dropdown" href="#" style="float: right; padding: .75rem 15px .75rem 15px; text-align: center;">{{ Auth()->user()->name }}</a>
        <div class="dropdown-menu" style="left: unset; right: 0;">
          <a href="{{ route('changeAdminPassword') }}" class="dropdown-item">Change Password</a>
          <a href="{{ route('logout') }}" class="dropdown-item">Logout</a>
        </div>
  </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          @include('layout.sidebar')
        </nav>
        <main role="main" class="ml-sm-auto col-lg-10 col-12 px-4">
        	@yield('content')
	      </main>
    	</div>
    </div>

    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>  
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    
    <script>
    jQuery(function($) {
     var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
     $('ul a').each(function() {
      if (this.href === path) {
       $(this).parent('li').addClass('active');
      }
     });
    });
    </script>
    <script>
    $(document).ready( function () {
        $('#device_info').DataTable();
        
    } );
    </script>
    @yield('additionalScripts')
</body>
</html>
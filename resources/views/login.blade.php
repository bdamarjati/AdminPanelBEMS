<!DOCTYPE html><html lang='en' class=''>
<head>
	<title>BEMS Panel - Login</title>
	<style>
		html { width: 100%; height:100%; overflow:hidden; }
		
		@import url(https://fonts.googleapis.com/css?family=Open+Sans);
		
		body { 
			width: 100%;
			height:100%;
			font-family: 'Open Sans', sans-serif;
			background: #303030;
		}
		
		input {
		  color: #403866;
		  font-size: 13px;
		  border: 1px solid rgba(0,0,0,0.3);
		  border-radius: 8px;
		  display: block;
		  width: 100%;
		  background: transparent;
		  height: 30px;
		  padding: 3px;
		  margin-bottom: 10px;
		}
		
		.login{
			position: absolute;
			top: 50%;
			left: 50%;
			margin: -150px 0 0 -200px;
			width:300px;
			height:250px;
		}
		
		.login h1 { color: #000; text-align:center; }
		
		.login-btn {
		  font-size: 13px;
		  color: #fff;
		  align-items: center;
		  line-height: 1;
		  text-transform: uppercase;
		  padding: 3px;
		  width: 100%;
		  height: 30px;
		  background-color: #827ffe;
		  border: 1px solid rgba(0,0,0,0.3);
		  border-radius: 8px;
		  margin-top: 10px;
		  margin-left: 3px;
		}

		.login-btn:hover {
		  background-color: #403866;
		}
		
		.container{
			width:100%;
			margin-left:auto;
			margin-right:auto;
			padding-left:.75rem;
			padding-right:.75rem;
		}
		
		.white-box{
			background-color:#fff;
			border-radius:.5rem;
			-webkit-box-shadow:0 2px 4px 0 rgba(0,0,0,.1);
			box-shadow:0 2px 4px 0 rgba(0,0,0,.1);
			padding-top:2rem;
			padding-bottom:1rem;
			padding-left:3rem;
			padding-right:3rem;
			max-width:30rem;
		}
	</style>
</head>

<body>
<div class="container">
	<div class="login white-box">
		<h1>LOGIN PAGE</h1>
		<form method="POST" action="{{ route('loginData')}}">
			{{ csrf_field() }}
			<input type="text" name="email" placeholder="Email Address" required="" style="text-align: center"/>
			<input type="password" name="password" placeholder="Password" required="" style="text-align: center"/>
			<button class="login-btn">LOGIN</button>
		</form>
	</div>
</div>
</body>
</html>
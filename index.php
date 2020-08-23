<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scal=1">
	<title>FTP login system</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="js/index.js"></script>
	<style>
		.right-option{
			width: 150px;
			background: black;
			color :white;
			position: absolute;
			z-index: 1000;
			display: none;
		}
		.right-option div{
			padding-top: 5px;
			padding-left: 5px;
			padding-right: 5px;
		}
		.right-option div:hover{
			background: red;
		}
	</style>
</head>
<body>
	<div class="container">
		<h2 class="text-center bg-white text-success py-2">Saurabh K FTP Login system</h2>
	<div class="row">
		<div class="col-md-4">
			<div class="jumbotron py-2 border bg-white shadow-sm" style="height: 350px">
				<form class="login-form">
					<div class="form-group">
						<label for="ip">DOMAIN IP</label>
						<input type="text" name="ip" class="form-control" id="ip" placeholder="192.168.1.1">
					</div>
					<div class="form-group">
						<label for="username">USERNAME</label>
						<input type="text" name="username" class="form-control" id="username" placeholder="youremail@demo.com">
					</div>
					<div class="form-group">
						<label for="password">PASSWORD</label>
						<input type="password" name="password" class="form-control" id="password">
					</div>
					<button class="btn btn-primary" type="submit">LOGIN</button>
				</form>
			</div>
		</div>
		<div class="col-md-8">
			<div class="jumbotron py-2 bg-white border overflow-auto response shadow-sm" style="height: 350px">
				
			</div>
		</div>
		<div class="col-md-12">
			<h5>LIVE STATUS</h5>
			<div class="jumbotron py-2 bg-white border overflow-auto status shadow-sm">
				
			</div>
		</div>
	</div>
</div>
<div class="container-fluid">
	<div class="jumbotron bg-white shadow-sm py-3 border">
		<div class="row">
			<div class="col-md-12 d-flex justify-content-between">
				<div class="editor-menu">
					
				</div>
				<div>
					<button class="btn btn-info save-btn">
						<i class="fa fa-save"></i> Save
					</button>
				</div>
			</div>
			<div class="col-md-12 editor-page">
				
			</div>
		</div>
	</div>
</div>

<!--Right click design-->
<div class="right-option">
		<div class="menu" action="download">
			<i class="fa fa-download"></i>
			<label>Download</label>
		</div>
		<div class="menu" action="edit">
			<i class="fa fa-edit"></i>
			<label>Edit</label>
		</div>
		<div class="menu" action="rename">
			<i class="fa fa-pencil"></i>
			<label>Rename</label>
		</div>
		<div class="menu" action="delete">
			<i class="fa fa-trash"></i>
			<label>Delete</label>
		</div>
		<div class="menu" action="copy">
			<i class="fa fa-copy"></i>
			<label>Copy</label>
		</div>
		<div class="menu" action="move">
			<i class="fa fa-arrows"></i>
			<label>Move</label>
		</div>
</div>
</div>
</body>
</html>
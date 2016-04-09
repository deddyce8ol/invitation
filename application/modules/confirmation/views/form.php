<html>
<head>
	<title>Konfirmasi Undangan</title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
		<div class="col-md-12">
			<?php echo form_open($form_action, "name='form_confirmation' id='form_confirmation' class='form-horizontal'"); ?>
				<div class="form-group">
					<legend>Form Konfirmasi Kehadiran</legend>
				</div>
				<?php echo $this->session->flashdata('message');?>
				<div class="form-group">
				  	<label class="col-md-4 control-label" for="code">Kode Undangan</label>  
					<div class="col-md-3">
						  <input id="code" name="code" type="text" placeholder="Kode Undangan" class="form-control" required="">
						  <span class="help-block">Ketikan Kode Undangan</span>  						
					</div>
					<div class="col-sm-2 col-sm-offset-2">
					</div>
				</div>
				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="password">Sandi</label>  
				  <div class="col-md-4">
				  <input id="password" name="password" type="password" placeholder="Sandi" class="form-control input-md" required="">
				  <span class="help-block">Sandi</span>  
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-md-4 control-label" for="name"></label>  
				  <div class="col-md-4">
				  	<button type="submit" class="btn btn-primary">Proses</button>
				  </div>
				</div>
			<?php echo form_close();?>
			
		</div>
	</div>
</body>
</html>
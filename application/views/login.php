<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Home</title>
	
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<meta name="viewport" content="user-scalable=no, width=device-width" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	
	<style>
	@font-face {
		font-family: 'avenir';
		src: url('<?php echo base_url(); ?>fonts/Avenir-Medium.otf');
		font-weight: normal;
		font-style: normal;
	}
	@font-face {
		font-family: 'bignoodle';
		src: url('<?php echo base_url(); ?>fonts/big_noodle_titling.ttf');
		font-weight: normal;
		font-style: normal;
	}
	</style>
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/main.css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
	
</head>
<body id="container" style="margin:auto;padding:0">
		<div style="min-height:25%;background:#ff9219">
			<div style="padding-top:10%;text-align:center;font-size:500%;font-family:'bignoodle'">MATCHSOFT</div>
		</div>
		<div style="min-height:64%;background:#f3f3f3;text-align:center;margin:auto;font-family:bignoodle;">
			<?php
				echo form_open('main/validateuser');
				echo "<br><br><div style='font-size:250%;color:black;padding-top:1%'>C&oacute;DIGO:</div><br>";
				echo "<input type='text' name='code' placeholder='ALLS' style='text-transform:uppercase;border:0;border-right: 1px solid #ddd;border-top:2px solid #ddd;width:250px;padding:5px;font-size:32px;text-align:center'/>";
				echo "<br><br><br>";
				echo "<input type='submit' value='INICIAR' id='loginbtn' style='border-radius:0;font-family:bignoodle;font-size:250%;background:#ff9219;color:white;padding:10px 80px;float:none;'/><br>";
				echo form_close();
			?>
			<br>
			<a href="<?php echo base_url(); ?>main/help" style="font-family:avenir;color:#444;font-size:120%">
				&iquest;C&oacute;mo consigo un c&oacute;digo de entrada?
			</a>
			<br><br>
		</div>
		<div style="height:11%;font-family:avenir;font-size:140%;text-align:center;padding-top:1%;padding:3%">
			Deseas conocer mas acerca del proyecto? <a href="<?php echo base_url(); ?>main/about" style="color:#ff9219">Click Aqu&iacute;</a>
		</div>
</body>
</html>
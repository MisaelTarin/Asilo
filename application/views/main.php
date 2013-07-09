<body>
<div>
	<div style="height:7px"></div>
	
	<div id="userbar" style="font-family:'bignoodle';font-size:200%;color:white;background: #1b4697;">
		&nbsp;&nbsp;&nbsp;&nbsp;PROYECTO ALEATORIO
	</div>
	<div style="min-height:100px;">
		<?php
			foreach($project as $data)
			{
				echo "<img src='".base_url()."images/project/".$data->id.".jpg' style='width:100%'/>";
			}
		?>
	</div>
	
	<div id="hideinfo">
	<div style="background:#333;padding:10px 0px;padding-top:0px;margin-top:-10px">
		<?php
			foreach($project as $data)
			{
				echo "<a href='project/$data->id'><div style='font-family:avenir;padding:10px;margin:5px;color:#ddd;'>";
				echo "<h2>".strtoupper($data->name)."</h2>".$data->summary;
				echo "<div style='float:right;margin:10px;color:white;font-size:120%'>Ver m&aacute;s</div>";
				echo "<br><br>";
				echo "</div></a>";
			}
		?>
	</div>
	
	<div id="userbar" style="font-family:'bignoodle';font-size:200%;color:white;background: #1b4697;margin-top:-10px">
		&nbsp;&nbsp;&nbsp;&nbsp;ESTAD&iacute;STICAS DEL EVENTO
	</div>
	
	<div style="height:150px;background:#f3f3f3;color:#163674;font-family:avenir;font-size:200%;text-align:center">
		<table style="text-align:center;margin:0 auto;">
		<tr>
			<td>
				<h1><?php echo $likecount; ?></h1>
			</td>
			<td></td>
			<td>
				<h1><?php echo $pointcount; ?></h1>
			</td>
		</tr>
		<tr>
			<td>
				Apoyos
			</td>
			<td>&nbsp;&nbsp;&nbsp;</td>
			<td>
				Puntos
			</td>
		</tr>
		</table>
	</div>
	
	<div id="userbar" style="font-family:'bignoodle';font-size:200%;color:white;background: #1b4697;margin-top:-10px">
		&nbsp;&nbsp;&nbsp;&nbsp;POPULARES
	</div>
	
	<div style="height:150px;background:#f3f3f3;color:#333;font-family:avenir;font-size:150%">
		<table><tr>
			<td>
				<img style="height:120px;width:120px;padding:10px" src="<?php echo base_url();?>images/medal.png"/>
			</td>
			<td>
			<?php 
			$cs = 1; 
			foreach($popular as $data)
			{
				echo $cs ." - ". $data->name."<br>";
				$cs = $cs+1;
			}?>
				<br>
				<a href="<?php echo base_url(); ?>main/popular"><span style="background:#1b4697;color:white;padding:5px 13px;margin:20px">Ver m&aacute;s</span></a>
			</td>
		</tr></table>
	</div>
	
	<div style="height:150px;font-family:avenir;">
		<h1 style="text-align:center;padding-top:50px">NEWS FEED</h1>
	</div>
	
	<a href="<?php echo base_url();?>main/help" ><div id="menuopt" style="font-family:bignoodle;font-size:200%;background:#ff9219;border-bottom:1px solid #d57b17">
	&emsp;Ayuda
	</div></a>
	<a href="<?php echo base_url();?>main/about" ><div id="menuopt" style="font-family:bignoodle;font-size:200%;background:#ff9219;border-bottom:0px solid">
	&emsp;Acerca de <span style="font-size:120%;font-weight:bold">MATCHSOFT</span>
	</div></a>
	</div>
</div>

</body>
</html>
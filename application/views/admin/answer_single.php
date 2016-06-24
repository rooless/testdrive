<div class="container" style="padding: 50px 0 50px 0;">
	<div class="row">
		<div class="col-md-6 col-md-offset-4">
			<form method="post" action="../answer/create_single">

				<?php echo  "<p style='color:#1E90FF; font-size:22px;'>" .  $this->session->userdata('nametest') . ".</p>"; ?>
				<?php echo  "<p style='color:#1E90FF; font-size:22px;'>" . 
					//$this->session->userdata('numquestion') . ". "; 
					$num . ". "; 
				?>
				<?php 
					//echo $this->session->userdata('namequestion')  . "</p>"; 
					echo $question . "</p>"; 
				?>

				<?php 
					//$countans = $this->session->userdata('countans');
					for ( $i=0; $i < $countans; $i++ )
					{
						echo "<div class='input-group'><span class='input-group-addon'><input type='radio' id='answer".$i."' name='answer[]' value='".$i."'></span><input name='nameanswer[]' id='nameanswer".$i."' type='text' class='form-control'></div>";
					}
				?>
				<input id="btnsend" type="submit" class="btn btn-success" value="OK">
				</form>
		</div>
	</div>
</div>	
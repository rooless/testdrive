		<p class="text-left"><?php 
			if($type == 1){
				echo "<input name='single' type='radio' class='check' value='".$id."'>   ".$name;
			} else echo "<input name='multiple' type='checkbox' class='check' value='".$id."'>   ".$name;
		?> </p>
<?php
		if ($type==1){
			if ($richtig == 1){
					echo "<p><input type='radio' checked disabled>   " . $name . "</p>";
				} else echo"<p><input type='radio' disabled>   " . $name . "</p>";
		} else if($type == 2){
			if ($richtig == 1){
					echo "<p><input type='checkbox' checked disabled>   " . $name . "</p>";
				} else echo"<p><input type='checkbox' disabled>   " . $name . "</p>";
		}
?>
<?php
		if ($qtype==1){
			echo "<p><input name='simple' type='radio'>   " . $aname . "</p>";
		} else if($qtype == 2){
			echo "<p><input name='multiple' type='checkbox'>   " . $aname . "</p>";
		}
?>
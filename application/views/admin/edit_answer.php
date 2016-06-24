<?php
		if ($type==1){
			if ($richtig == 1){
					echo "<p><input type='radio' checked name='ans_".$qid."' value='".$id."'>   <input type='text' value='".$name."' size='100'></p>";
				} else echo"<p><input type='radio' name='ans_".$qid."' value='".$id."'><input type='text' value='".$name."' size='100'></p>";
		} else if($type == 2){
			if ($richtig == 1){
					echo "<p><input type='checkbox' checked name='ans_".$qid."' value='".$id."'>   " . $name . "</p>";
				} else echo"<p><input type='checkbox' name='ans_".$qid."' value='".$id."'>   " . $name . "</p>";
		}
?>
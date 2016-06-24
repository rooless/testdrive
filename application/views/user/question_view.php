<p class="lead" >
	<input type="hidden" id="question_id" value="<?php echo $id; ?>">
	<h3><b style='color:blue;'><?php echo $name;?></b></h3></p>
	<p><h6><?php
					if ($type == 1) echo "(Отметьте один правильный вариант ответа. )";
					if ($type == 2) echo "(Отметьте все возможные варианты ответов. )";
				?></h6></p>
<div class="dropdown">
	<a data-toggle="dropdown" href="/testdrive/test/viewer_test/<?php echo $id; ?> "><?php echo $name; ?> <span class="caret"></span></a>
	<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
		<li><a href="/testdrive/test/viewer_test/<?php echo $id; ?>"><span class="glyphicon glyphicon-plus-sign"></span>   Просмотр   </a></li>
		<li><a href="/testdrive/test/import/<?php echo $id; ?>"><span class="glyphicon glyphicon-import"></span>   Import   </a></li>
		<!--<li><a href="/testdrive/test/export/"><span class="glyphicon glyphicon-export"></span>   Export   </a></li> -->
		<!--<li><a href="/testdrive/test/edit_test/<?php echo $id; ?>"><span class="glyphicon glyphicon-pencil"></span>   Изменить   </a></li>-->
		<?php
			if($view == 0){	
		?>
		<li><a href="/testdrive/test/noview_test/<?php echo $id; ?>"><span class="glyphicon glyphicon-eye-close"></span>   Не отображать   </a></li>
		<?php
			} else if($view == 1){
		?>
		<li><a href="/testdrive/test/view_test/<?php echo $id; ?>"><span class="glyphicon glyphicon-eye-open"></span>   Отобразить   </a></li>
		<?php
			}
		?>
		<li><a href="/testdrive/test/delete_test/<?php echo $id; ?>"><span class="glyphicon glyphicon-trash"></span>   Удалить   </a></li>
		<li><a href="/testdrive/test/list_users/<?php echo $id; ?>/0"><span class="glyphicon glyphicon-list-alt"></span>   Список тестируемых   </a></li>
	</ul>
</div>

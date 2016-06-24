<div class="col-6 col-sm-6 col-lg-5">
	<div class="dropdown">
		<a data-toggle="dropdown" href="test/viewer_group/<?php echo $id; ?>">
			<?php echo $name; ?><span class="caret"></span> <span class="badge pull-right"><?php echo $cnt; ?></span> 
		</a>
		<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
			<li><a href="test/viewer_group/<?php echo $id; ?>"><span class="glyphicon glyphicon-plus-sign"></span>   Просмотр   </a></li>
			<li><a href="/testdrive/test/delete_group/<?= $id ?>"><span class="glyphicon glyphicon-trash"></span>   Удалить   </a></li>
		</ul>
	</div>
</div>

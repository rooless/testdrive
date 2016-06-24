<div class="header">
	
	<ul class="nav nav-pills pull-right">
		<li>
			<div class="btn-group">
				<a href="/testdrive/" class="btn btn-default dropdown-toggle btn btn-success">Главная</a>
			</div>				
		</li>
		<li class="dropdown">
				<div class="btn-group">
					<button type="button" class="btn btn-default dropdown-toggle btn btn-success" data-toggle="dropdown"><?php echo $this->session->userdata('login'); ?> <span class="caret"></span></button>
					<ul class="dropdown-menu" role="menu">
						<li><a href="/testdrive/users/exit_user"><span class="glyphicon glyphicon-log-out">   Выход   </span></a></li>
					</ul>
				</div>
				
		</li>
	</ul>
<h3 class="text-muted">Test Online</h3>
	
</div>
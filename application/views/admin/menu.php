<div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
	<div class="container">
		 <div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/testdrive/">Test Online</a>
		</div>
		<div class="navbar-collapse collapse" style="height:1px; ">
			<ul class="nav navbar-nav">
				<li><a href="/testdrive/">Главная</a></li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">Создать <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="/testdrive/menu/creategroup">Создать группу</a></li>
						<li><a href="/testdrive/menu/createtest">Создать тест</a></li>
					</ul>
				</li>
				<li><a href="/testdrive/test/export/">Загрузить тест</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $this->session->userdata('login'); ?> <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="/testdrive/users/exit_user"><span class="glyphicon glyphicon-log-out">   Выход   </span></a></li>
					</ul>
				</li>
			</ul>
		</div><!-- /.navbar-collapse collapse -->
	</div> <!-- /container -->
</div> <!-- /navbar navbar-fixed-top navbar-inverse -->
<?php foreach ($query->result() as $row) 
{
	echo "<h1>" . $row->login."</h1>";
	//echo $row->password;
}
?>
Выберите тест:
<ul>
<li><?php echo url('', 'Тест 1');?></li>
<li><a href='#'>Тест 2</a></li>
<li><a href='#'>Тест 3</a></li>
<li><a href='#'>Тест 4</a></li>
<li><a href='#'>Тест 5</a></li>
</ul>
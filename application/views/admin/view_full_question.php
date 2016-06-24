	<div class="panel panel-default">
	<div class="panel-heading">
		<h4 class="panel-title">
			<a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $qid; ?>"><?php echo $qcode . '. ' . $qname; ?></a>
			<a href="<?php echo $test_id; ?>" title="удалить" style="position: relative; float:right;" id="delete_<?php echo $qid; ?>">      <span class="glyphicon glyphicon-trash"></span>      </a>
			<a href="#<?php echo $qid; ?>" title="редактировать" style="position: relative; float:right;">      <span class="glyphicon glyphicon-pencil"></span>      </a>
			
		</h4>
	</div> <!-- panel-heading -->
	
	<script>
		$('#delete_<?php echo $qid; ?>').click(function(){
			//alert('/testdrive/test/delete_question/<?php echo $qid; ?>');
			$.post('/testdrive/test/delete_question/<?php echo $qid; ?>');
		});
	</script>
	
	<div id="<?php echo $qid; ?>" class="panel-collapse collapse">
	<!-- 
	Если надо, чтобы все вопросы загружались сразу, то использовать класс in
	<div id="<?php echo $qid; ?>" class="panel-collapse collapse"> -->
		<div class="panel-body">
	
	

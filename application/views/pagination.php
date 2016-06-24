<!--<div class="center-pagination"> -->
	<ul class="pager">
		<?php
			if ($current_num == $total_rows){ 
				redirect('/test/view_result_test/' . $testid );
			} else {
		?>
		<li><a class="next" href="/testdrive/test/pass_test/<?php echo $testid; ?>/<?php echo ++$current_num; ?>">Ответить</a></li>
		<li><a href="/testdrive/test/pass_test/<?php echo $testid; ?>/<?php echo ++$current_num; ?>">Пропустить</a></li>
		<?php }?>
	</ul>
</div>

<!-- </div>-->
<script>
	$('.next').click(function(){
		
		var test_id = <?php echo $testid; ?>;
		var question_id = $('#question_id').val();		
		
		$("[name='multiple']:checked").each(function(){
			var mlt = $(this).val();
			//alert(mlt);
			$.post('/testdrive/test/write_result/'+test_id+'/'+ question_id + '/' + mlt);
			console.log(test_id+'/'+ question_id + '/' + mlt);
		});
		
		$("[name='single']:checked").each(function(){
			var answer = $(this).val();
			//alert(answer);
			$.post('/testdrive/test/write_result/'+test_id+'/'+ question_id + '/' + answer);
		});
			
	});
</script>
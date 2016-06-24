<script>
$(document).ready(function(){
	$("input").click(function(){
		$.ajax({
			url: "/testdrive/index.php/test/set_user_response",
			cache:false
		});
	});
});
</script>
<!-- <input type="button" class="btn btn-success" value="ОК"> -->
</div>
</div>	<!-- panel-collapse collapse in -->
</div> <!-- .panel panel-default -->
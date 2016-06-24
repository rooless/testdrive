

<!--<input type="button" class="btn btn-success" value="Назад" id="back">-->
<input type="button" class="btn btn-success" value="Дальше" onClick="window.location.href='../test/weiter' ">
<input type="button" class="btn btn-success" value="Завершить" onClick="window.location.href='../test/exittest' ">

<script>
$('#back').click(function(){
	alert('back');
	$.post('/testdrive/test/back');
});
</script>
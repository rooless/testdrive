<div class="container" style="padding: 50px 0 50px 0;">
	<div class="row">
		<div class="col-md-6 col-md-offset-4">
			<?php echo "<p style='color:#1E90FF; font-size:22px;'>" . $this->session->userdata('idtest') . '. ' . $this->session->userdata('nametest') . "</p>"; ?>

			<div id="num">
				<form method="post" action="../test/question">
				<label>Введите номер вопроса:</label>
				<input id="numQuestion" type="text" name="num" size="2" class="form-control input-sm" type="number" placeholder="" value="<?php echo ++$maxcode; ?>">
				<label>Введите вопрос:</label> 
				<input id="nameQuestion" type="text" name="name" class="form-control" aria-describedby="helpBlock">
				<label>Выберите уровень сложности:</label>
				<select id="level" name="level" class="form-control">
					<option></option>
					<option value="1">Лёгкий</option>
					<option value="2">Средний</option>
					<option value="3">Тяжелый</option>
				</select><br />
				<label>Введите количество баллов:</label>
				<input id="mark" name="mark" type="text" name="num" size="2" class="form-control input-sm">
				<label>Выберите тип ответа:</label>
				<label class="radio">
					<input type="radio" name="optionsRadios" id="optionsRadios1" value="1">single
				</label>
				<label class="radio">
					<input type="radio" name="optionsRadios" id="optionsRadios2" value="2">multiple
				</label>
				
				<label>Введите количество ответов:</label>
				<input id="countAnswer" type="text" name="countAnswer" class="form-control input-sm" type="number" placeholder="" >
				<input id="btnsend" type="submit" class="btn btn-success" value="OK">
				</form>
			</div>
		</div>
	</div>
</div>	
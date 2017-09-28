<div class = "container" id = "main-container">


<!-- ----------Стили нужно будет доработать------------  -->
	<div class = "block-page">
		<div class = "intro-block flex-middle">
			<form action = "javascript:void(null)" id = "activate-form" method = "post" onsubmit = "activate()">

				<div class = "title-form">Активация профиля</div>
				<div id = "desc-form">Введите pin для активации</div>
				<div class = "input-field">
					<label>
						<div class = "ttl-inp">Email</div>
						<input type = "email" class = "input-text" id = "email" placeholder = "Ваш email ..." value = "<?=$this -> email()?>">
					</label>
					<label>
						<div class = "ttl-inp">Pin</div>
						<input type = "text" class = "input-text" id = "pin" placeholder = "12-значный PIN из сообщения">
					</label>
				</div>
				<div class = "submit-field">
					<input type = "submit" value = "Активировать" >
				</div>

			</form>
		</div>
	</div>

</div>
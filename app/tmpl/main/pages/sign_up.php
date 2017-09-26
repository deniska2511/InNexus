<div class = "container" id = "main-container">
	<div class = "block-page">
		<div class = "intro-block flex-middle">
			<form action = "javascript:void(null)" method = "post" id = "regist-form" onsubmit = "regist()">
				<div class = "title-form">Регистрация</div>
				<span id = "desc-form">Создай свой аккаунт и обучайся программированию с помощью InNexus</span>
				<div id = "steps-reg-list">
					<div class = "step-reg">
						<div class = "img-step">
							<img src = "<?=$this -> config['SITE_URL']?>app/tmpl/<?=$this -> config['SITE_TMPL']?>/img/other/man_1.png">
						</div>
						<div class = "desc-step">
							<div class = "step-num">Шаг 1:</div>
							<div class = "text">Создай свой аккаунт</div>
						</div>
					</div>
					<div class = "step-reg">
						<div class = "img-step">
							<img src = "<?=$this -> config['SITE_URL']?>app/tmpl/<?=$this -> config['SITE_TMPL']?>/img/other/coin.png">
						</div>
						<div class = "desc-step">
							<div class = "step-num">Шаг 2:</div>
							<div class = "text">Выбери тарифный план</div>
						</div>
					</div>
					<div class = "step-reg">
						<div class = "img-step">
							<img src = "<?=$this -> config['SITE_URL']?>app/tmpl/<?=$this -> config['SITE_TMPL']?>/img/other/settings.png">
						</div>
						<div class = "desc-step">
							<div class = "step-num">Шаг 3:</div>
							<div class = "text">Дополнительно</div>
						</div>
					</div>
				</div>
				<div class = "desc-now-step">Создание профиля</div>
				<div class = "input-field">
					<label>
						<div class = "ttl-inp">Username</div>
						<input type = "text" id = "user-name" placeholder = "Ваше имя..." required>
						<div class = "input-desc">Введите ваше имя и фамилию через пробел.</div>
					</label>
					<label>
						<div class = "ttl-inp">Login</div>
						<input type = "text" id = "login" placeholder = "Ваше имя..." required>
						<div class = "input-desc">Придумайте login для авторизации.</div>
					</label>
					<label>
						<div class = "ttl-inp">Email Address</div>
						<input type = "email" id = "email" placeholder = "your@example.com ..." required>
						<div class = "input-desc">Ваш действующий адрес email.</div>
					</label>
					<label>
						<div class = "ttl-inp">Password</div>
						<input type = "password" id = "password" placeholder = "Ваш пароль..." required>
						<div class = "input-desc">Придумайте пароль.</div>
					</label>
				</div>
			</form>
		</div>
	</div>
</div>
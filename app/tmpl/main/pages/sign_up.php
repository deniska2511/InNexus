<div class = "container" id = "main-container">
	<div class = "block-page">
		<div class = "intro-block flex-middle">
			<form action = "javascript:void(null)" method = "post" id = "regist-form" onsubmit = "<? if( $_GET['url2'] == 'create_profile' ) echo 'toNextStepReg(2)';elseif( $_GET['url2'] == 'tarif_plane' ) echo 'toNextStepReg(3)'; elseif( $_GET['url2'] == 'dop' ) echo 'regist()' ?>">
				<div class = "title-form">Регистрация</div>
				<span id = "desc-form">Создай свой аккаунт и обучайся программированию с помощью InNexus</span>
				<div id = "steps-reg-list">
					<div class = "step-reg">
						<div class = "img-step">
							<img src = <? echo ( $_GET['url2'] == 'create_profile' ) ? "{$this -> config['SITE_URL']}app/tmpl/{$this -> config['SITE_TMPL']}/img/other/man_1.png" : "{$this -> config['SITE_URL']}app/tmpl/{$this -> config['SITE_TMPL']}/img/other/man.png"?> >
						</div>
						<div class = "desc-step">
							<div class = "step-num">Шаг 1:</div>
							<div class = "text">Создай свой аккаунт</div>
						</div>
					</div>
					<div class = "step-reg">
						<div class = "img-step">
							<img src = <? echo ( $_GET['url2'] == 'tarif_plane' ) ? "{$this -> config['SITE_URL']}app/tmpl/{$this -> config['SITE_TMPL']}/img/other/coin_1.png" : "{$this -> config['SITE_URL']}app/tmpl/{$this -> config['SITE_TMPL']}/img/other/coin.png"?> >
						</div>
						<div class = "desc-step">
							<div class = "step-num">Шаг 2:</div>
							<div class = "text">Выбери тарифный план</div>
						</div>
					</div>
					<div class = "step-reg">
						<div class = "img-step">
							<img src = <? echo ( $_GET['url2'] == 'dop' ) ? "{$this -> config['SITE_URL']}app/tmpl/{$this -> config['SITE_TMPL']}/img/other/settings_1.png" : "{$this -> config['SITE_URL']}app/tmpl/{$this -> config['SITE_TMPL']}/img/other/settings.png"?> >
						</div>
						<div class = "desc-step">
							<div class = "step-num">Шаг 3:</div>
							<div class = "text">Дополнительно</div>
						</div>
					</div>
				</div>
			<?php
			if( $_GET['url2'] == 'create_profile' ){
			?>
				<div class = "desc-now-step">Создание профиля</div>
				<div class = "flex-start">
					<div class = "input-field">
						<label>
							<div class = "ttl-inp">Username</div>
							<input type = "text" id = "user-name" placeholder = "Ваше имя..." required>
							<div class = "input-desc">Введите ваше имя и фамилию через пробел.</div>
						</label>
						<label>
							<div class = "ttl-inp">Login</div>
							<input type = "text" id = "login" placeholder = "Ваш login..." required>
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
					<div class = "right-block-form">
						<div class = "title">Создав профиль:</div>
						<ul>
							<li><img src = "<?=$this -> config['SITE_URL']?>app/tmpl/<?=$this -> config['SITE_TMPL']?>/img/other/check-mark.png"> Ты сможешь начать обучение</li>
							<li><img src = "<?=$this -> config['SITE_URL']?>app/tmpl/<?=$this -> config['SITE_TMPL']?>/img/other/check-mark.png"> Получишь доступ к платформе</li>
							<li><img src = "<?=$this -> config['SITE_URL']?>app/tmpl/<?=$this -> config['SITE_TMPL']?>/img/other/check-mark.png"> Ты сможешь создавать свои проекты</li>
						</ul>
					</div>
				</div>
				<div class = "terms">

				</div>
				<div class = "submit-field">
					<input type = "submit" value = "Следующий шаг" >
				</div>
			<?php
			}
			elseif( $_GET['url2'] == 'tarif_plane' and !empty( $_SESSION['step-reg'] ) and $_SESSION['step-reg'] == "tarif_plane" ){
			?>
			<div class = "desc-now-step">Выбор тарифного плана</div>
				<div class = "flex-start">
					<div class = "input-field">
						
					</div>
					<div class = "right-block-form">
						<div class = "title">Создав профиль:</div>
						<ul>
							<li><img src = "<?=$this -> config['SITE_URL']?>app/tmpl/<?=$this -> config['SITE_TMPL']?>/img/other/check-mark.png"> Ты сможешь начать обучение</li>
							<li><img src = "<?=$this -> config['SITE_URL']?>app/tmpl/<?=$this -> config['SITE_TMPL']?>/img/other/check-mark.png"> Получишь доступ к платформе</li>
							<li><img src = "<?=$this -> config['SITE_URL']?>app/tmpl/<?=$this -> config['SITE_TMPL']?>/img/other/check-mark.png"> Ты сможешь создавать свои проекты</li>
						</ul>
					</div>
				</div>
				<div class = "terms">

				</div>
				<div class = "submit-field">
					<input type = "submit" value = "Следующий шаг">
				</div>
			<?php
			}
			elseif( $_GET['url2'] == "dop" ){
			?>
			<div class = "desc-now-step">Дополнительно</div>
				<div class = "flex-start">
					<div class = "input-field">
						
					</div>
					<div class = "right-block-form">
						<div class = "title">Создав профиль:</div>
						<ul>
							<li><img src = "<?=$this -> config['SITE_URL']?>app/tmpl/<?=$this -> config['SITE_TMPL']?>/img/other/check-mark.png"> Ты сможешь начать обучение</li>
							<li><img src = "<?=$this -> config['SITE_URL']?>app/tmpl/<?=$this -> config['SITE_TMPL']?>/img/other/check-mark.png"> Получишь доступ к платформе</li>
							<li><img src = "<?=$this -> config['SITE_URL']?>app/tmpl/<?=$this -> config['SITE_TMPL']?>/img/other/check-mark.png"> Ты сможешь создавать свои проекты</li>
						</ul>
					</div>
				</div>
				<div class = "terms">

				</div>
				<div class = "submit-field">
					<input type = "submit" value = "Следующий шаг">
				</div>
			<?php
			}
			?>
			</form>
		</div>
	</div>
</div>
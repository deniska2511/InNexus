<div class = "container" id = "main-container">
	<div class = "block-page">
		<div class = "intro-block flex-middle">
			<form action = "javascript:void(null)" method = "post" id = "regist-form" onsubmit = "<? if( $_GET['url2'] == 'create_profile' ) echo 'toNextStepReg(2)';elseif( $_GET['url2'] == 'tarif_plane' ) echo 'toNextStepReg(3)'; elseif( $_GET['url2'] == 'dop' ) echo 'toNextStepReg(\'regist\')' ?>">
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
					<div class = "radio-field">
						<div class = "tarif-list">
							<label>
								<input type = "radio" class = "tarif-input" name = "tarif" value = "1" checked>
								<span class = "text">Бесплатный</span>
							</label>
						</div>
						<div class = "tarif-list">
							<label>
								<input type = "radio" class = "tarif-input" name = "tarif" value = "2">
								<span class = "text">Средний</span>
							</label>
						</div>
						<div class = "tarif-list">
							<label>
								<input type = "radio" class = "tarif-input" name = "tarif" value = "3">
								<span class = "text">Premium</span>
							</label>
						</div>
						<div class = "checkbox-field">
							<label>
								<input type = "checkbox" id = "send-to-email-desc" name = "send-to-email-desc" value = "true">
								<span class = "text">Отправить на почту данные о моем тарифе</span>
							</label>
						</div>
						<div class = "checkbox-field">
							<label>
								<input type = "checkbox" id = "tarif-edit" name = "tarif-edit" value = "true">
								<span class = "text">Отправить на почту информацию о настройке тарифа</span>
							</label>
						</div>
					</div>
					<div class = "right-block-form" id = "trafic-right-block">
						<div class = "title">Краткое описание тарифов:</div>
						<ul>
							<li class = "fir">При подключении тарифа - Бесплатный:</li>
							<ul>
								<li><img src = "<?=$this -> config['SITE_URL']?>app/tmpl/<?=$this -> config['SITE_TMPL']?>/img/other/check-mark.png"> доступно обучение ( с ограничениями )</li>
								<li><img src = "<?=$this -> config['SITE_URL']?>app/tmpl/<?=$this -> config['SITE_TMPL']?>/img/other/check-mark.png"> доступны обучающие статьи</li>
								<li><img src = "<?=$this -> config['SITE_URL']?>app/tmpl/<?=$this -> config['SITE_TMPL']?>/img/other/check-mark.png"> форум</li>
							</ul>
							<li class = "fir">При подключении тарифа - Средний:</li>
							<ul>
								<li><img src = "<?=$this -> config['SITE_URL']?>app/tmpl/<?=$this -> config['SITE_TMPL']?>/img/other/check-mark.png">доступно практически всё, кроме</li>
								<li><img src = "<?=$this -> config['SITE_URL']?>app/tmpl/<?=$this -> config['SITE_TMPL']?>/img/other/no.png"> нет возможности создавать закрытые проекты</li>
								<li><img src = "<?=$this -> config['SITE_URL']?>app/tmpl/<?=$this -> config['SITE_TMPL']?>/img/other/no.png"> ограниченное количество места в облаке</li>
							</ul>
							<li class = "fir">При подключении тарифа - Premium:</li>
							<ul>
								<li><img src = "<?=$this -> config['SITE_URL']?>app/tmpl/<?=$this -> config['SITE_TMPL']?>/img/other/check-mark.png"> доступны все возможности платформы</li>
							</ul>
						</ul>
					</div>
				</div>
				<div class = "terms">

				</div>
				<div class = "submit-field" style = "width: 50%">
					<input type = "submit" value = "Следующий шаг">
				</div>
			<?php
			}
			elseif( $_GET['url2'] == "dop" ){
			?>
			<div class = "desc-now-step">Дополнительно</div>
			<!-- Необходимо доработать проверку и поля -->
				<div class = "flex-start">
					<div class = "input-field">
						<label>
							<div class = "ttl-inp">Ваш город</div>
							<input type = "text" id = "city" placeholder = "Ваше город..." required>
							<div class = "input-desc">Введите ваш город.</div>
						</label>
						<label>
							<div class = "ttl-inp">Дата рождения</div>
							<div id = "date-field">
								<input type = "text" id = "day" placeholder = "01" maxlength = "2" required>
								<input type = "text" id = "month" placeholder = "января" required>
								<input type = "text" id = "year" placeholder = "<?=date("Y") - 15?>" required>
							</div>
							<div class = "input-desc">Дата вашего рождения.</div>
						</label>
						<label>
							<div class = "ttl-inp">Ваш опыт в программировании</div>
							<select id = "expir">
								<option selected>Новичок</option>
								<option>Ближе к среднему</option>
								<option>Средний</option>
								<option>Выше среднего</option>
								<option>Профи</option>
								<option>Затрудняюсь ответить</option>
							</select>
							<div class = "input-desc">Выберите уровень вашего опыта в программировании.</div>
						</label>
						<label>
							<div class = "ttl-inp">Цель регистрации в InNexus</div>
							<select id = "purpose">
								<option selected>Изучение в школе</option>
								<option>Студент</option>
								<option>Преподаватель</option>
								<option>Хобби</option>
								<option>Работа</option>
								<option>Обчение новому</option>
								<option>Другое</option>
								<option>Затрудняюсь ответить</option>
							</select>
							<div class = "input-desc">Укажите вашу цель регистрации в InNexus.</div>
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
					<input type = "submit" value = "Завершить регистрацию">
				</div>
			<?php
			} 
			?>
			</form>
		</div>
	</div>
</div>
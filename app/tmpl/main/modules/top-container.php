<div class = "container" id = "top-container">
	<div class = "middle-container">
		<div class = "logotype">
			<a class = "a-block" href = "<?=$this -> config['SITE_URL']?>start"></a>
		</div>
		<nav class = "horizontal">
			<ul>
				<li>
					<a href = "">Курсы</a>
				</li>
				<li>
					<a href = "">Статьи</a>
				</li>
				<li>
					<a href = "">Видео</a>
				</li>
				<li>
					<a href = "">Тестирование</a>
				</li>
			</ul>
		</nav>
		<div class = "search">
			<form action = "javascript:void(null)" id = "top-search-form" method = "post" onsubmit = "search()">
				<input type = "search" name = "search" class = "input-search" placeholder = "Поиск по <?=$this -> config['SITE_NAME']?>...">
			</form>
		</div>
		<div id = "top-links-auth">
			<a href = "/sign_in">Войти</a>
			или
			<a href = "/sign_up">Регистрация</a>
		</div>
	</div>
</div>
<div id = "under"></div>
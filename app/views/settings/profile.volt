<div class="main right">
	<div class="card-name">Основные настройки</div>
	<div class="card-box">
		<div class="card-content">
			{{ form( url(['for': 'settings-profile']), 'class': 'form', 'data-ajax': 'true', 'method': 'post') }}
				<div class="form-group">
					<label for="firstname" class="form-label">Имя</label>
					{{ text_field('firstname', 'class': 'input input-big', 'value': user.firstname) }}
				</div>

				<div class="form-group">
					<label for="lastname" class="form-label">Фамилия</label>
					{{ text_field('lastname', 'class': 'input input-big', 'value': user.lastname) }}
				</div>

				<div class="form-group">
					<label for="gender" class="form-label">Пол</label>
					{{ select('gender', user.getGenderList(), 'class': 'input input-big', 'value': user.gender) }}
				</div>

				<div class="form-group">
					<label for="location" class="form-label">Местоположение</label>
					{{ text_field('location', 'class': 'input input-big', 'value': user.location) }}
				</div>

				<div class="form-group">
					<label for="about" class="form-label">О вас</label>
					{{ text_area('about', 'rows': 5, 'class': 'input input-big', 'value': user.about, 'style': 'resize: vertical;') }}
				</div>

				<div class="form-group">
					<label for="site" class="form-label">Ваш сайт</label>
					{{ text_field('site', 'class': 'input input-big', 'value': user.site) }}
				</div>

				<hr>

				<div class="form-group">
					{{ submit_button('Сохранить', 'class': 'btn') }}
				</div>
			{{ end_form() }}
		</div>
	</div>
</div>
<div class="sidebar left">
	<div class="card-box">
		<div class="card-content">
			<div class="user-photo">{{ image(user.getPhoto(), 'alt': user.getFullname()) }}</div>
			<div class="user-name">{{ link_to(['for': 'user-profile', 'id': user.id], user.getFullname()) }}</div>
		</div>
	</div>
	<div class="card-box">
		<div class="card-menu">
			{{ link_to(['for': 'settings-profile'], 'Основные настройки') }}
			{{ link_to(['for': 'settings-notify'], 'Почтовые уведомления') }}
			{{ link_to(['for': 'settings-resume'], 'Настройка резюме') }}
			{{ link_to(['for': 'settings-password'], 'Изменить пароль') }}
		</div>
	</div>
	<div class="card-box">
		<div class="card-menu">
			{{ link_to(['for': 'user-delete'], 'Удалить аккаунт') }}
		</div>
	</div>
</div>

<div class="clearfix"></div>
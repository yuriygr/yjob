<div class="main right">
	<div class="card-name">Изменить пароль</div>
	<div class="card-box">
		<div class="card-content">
			{{ form( url(['for': 'settings-password']), 'class': 'form', 'data-ajax': 'true', 'method': 'post') }}
				<div class="form-group">
					<label for="password" class="form-label">Старый пароль</label>
					{{ text_field('password', 'class': 'input input-big', 'placeholder': 'Старый пароль') }}
				</div>
				<hr>
				<div class="form-group">
					<label for="new_password" class="form-label">Новый пароль</label>
					{{ text_field('new_password', 'class': 'input input-big', 'placeholder': 'Новый пароль') }}
				</div>
				<div class="form-group">
					{{ text_field('conf_password', 'class': 'input input-big', 'placeholder': 'Ещё раз новый пароль') }}
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
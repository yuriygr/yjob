<div class="main right">
	<div class="card-name">Почтовые уведомления</div>
	<div class="card-box">
		<div class="card-content">
			{{ form( url(['for': 'settings-notify']), 'class': 'form', 'data-ajax': 'true', 'method': 'post') }}
				<div class="form-group">
				{% if user.notifyletter == 1 %}
					<label>{{ check_field('notifyletter', 'value': '1', 'checked': 'checked') }} Присылать уведомления</label>
				{% else %}
					<label>{{ check_field('notifyletter', 'value': '1') }} Присылать уведомления</label>
				{% endif %}
				</div>
				<div class="form-group">
				{% if user.newsletter == 1 %}
					<label>{{ check_field('newsletter', 'value': '1', 'checked': 'checked') }} Присылать новости сервиса</label>
				{% else %}
					<label>{{ check_field('newsletter', 'value': '1') }} Присылать новости сервиса</label>
				{% endif %}
				</div>
				<div class="form-group">
				{% if user.recomendedletter == 1 %}
					<label>{{ check_field('recomendedletter', 'value': '1', 'checked': 'checked') }} Присылать рекомендации</label>
				{% else %}
					<label>{{ check_field('recomendedletter', 'value': '1') }} Присылать рекомендации</label>
				{% endif %}
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
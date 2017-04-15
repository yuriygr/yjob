<div class="main left">
	<div class="card-name">Создание резюме</div>
	<div class="card-box">
		<div class="card-content">
			{{ form( url(['for': 'resume-create']), 'class': 'form', 'data-ajax': 'true', 'method': 'post') }}
				<div class="form-subtitle">Контактные данные</div>

				<div class="form-group">
					<label for="name" class="form-label">Ваше имя</label>
					{{ text_field('fullname', 'class': 'input input-big', 'value': user.fullname, 'disabled': 'disabled') }}
				</div>

				<div class="form-group">
					<label for="location" class="form-label">Местонахождение</label>
					{{ text_field('location', 'class': 'input input-big', 'value': user.location, 'disabled': 'disabled') }}
				</div>

				<div class="form-group">
					<label for="name" class="form-label">Ваш E-mail</label>
					{{ text_field('email', 'class': 'input input-big', 'value': user.email, 'disabled': 'disabled') }}
				</div>
				
				<div class="form-subtitle">Параметры</div>

				<div class="form-group">
					<label for="name" class="form-label">Желаемая должность</label>
					{{ text_field('name', 'class': 'input input-big', 'autofocus') }}
				</div>

				<div class="form-group">
					<label for="activity" class="form-label">Сфера деятельности</label>
					{{ select('activity', resume_activity, 'using': ['id', 'name'], 'class': 'input input-big') }}
				</div>

				<div class="form-group">
					<label for="schedule" class="form-label">График работы</label>
					{{ select('schedule', resume_schedule, 'using': ['id', 'name'], 'class': 'input input-big') }}
				</div>

				<div class="form-group">
					<label for="experience" class="form-label">Опыт работы</label>
					{{ select('experience', user.getExperienceList(), 'class': 'input input-big') }}
				</div>

				<div class="form-group">
					<label for="price" class="form-label">Зарплата</label>
					{{ text_field('price', 'class': 'input input-big') }}
				</div>

				<div class="form-group">
					<label for="gender" class="form-label">Ваш пол</label>
					{{ select('gender', user.getGenderList(), 'class': 'input input-big', 'value': user.gender, 'disabled': 'disabled') }}
				</div>

				<div class="form-group">
					<label for="content" class="form-label">О себе</label>
					{{ text_area('content', 'class': 'input input-big', 'rows': 5, 'style': 'resize: vertical;') }}
				</div>

				<div class="form-subtitle">Опыт работы</div>
				<div class="form-infotext">У тебя его нет, падла.</div>
				<hr>

				<div class="form-group">
					{{ submit_button('Создать', 'class': 'btn') }}
				</div>
			{{ end_form() }}
		</div>
	</div>
</div>
<div class="sidebar right">
	<div class="card-name">Справка</div>
	<div class="card-box">
		<div class="card-content">
			<p>Мы заполняем за вас некоторые данные исходя из вашего профиля.</p>
			<p>В случае возниковения проблем, пожалуйста, воспользуйтесь разделом {{ link_to(['for': 'page-link', 'slug': 'help'], 'Помощь') }}.</p>
		</div>
	</div>
</div>

<div class="clearfix"></div>
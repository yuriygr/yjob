<div class="main left">
	{{ partial("common/global_search", ['searchFor': 'resume']) }}
	{% for resume in resumes.items %}
		{{ partial("block/resume") }}
	{% endfor %}
</div>
<div class="sidebar right">
	<div class="card-box">
		<div class="card-button">
			{{ link_to(['for': 'resume-home'], 'Найти резюме', 'class': 'btn', 'data-filter-button': 'true' ) }}
		</div>
	</div>
	<div class="card-box">
		<div class="card-content">
			{{ form( url(['for': 'resume-home']), 'class': 'form', 'data-filter-form': 'true', 'method': 'get') }}
				{{ hidden_field('filter_query', 'class': 'hidden', 'value': filter_query) }}
				<div class="form-infotext">К сожалению, на данный момент поиск не работает.</div>
				<hr>

				<div class="form-group">
					<label for="filter_activity" class="form-label">Сфера деятельности</label>
					{{ text_field('filter_activity', 'class': 'input', 'value': filter_activity ) }}
				</div>

				<div class="form-group">
					<label for="filter_schedule" class="form-label">График работы</label>
					{{ text_field('filter_schedule', 'class': 'input', 'value': filter_schedule ) }}
				</div>
				
				<div class="form-group">
					<label for="filter_experience" class="form-label">Опыт работы</label>
					{{ text_field('filter_experience', 'class': 'input', 'value': filter_experience ) }}
				</div>

				<div class="form-group">
					<label for="filter_location" class="form-label">Местоположение</label>
					{{ text_field('filter_location', 'class': 'input', 'value': filter_location ) }}
				</div>

			
			{{ end_form() }}
		</div>
	</div>
</div>

<div class="clearfix"></div>
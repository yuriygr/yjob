<div class="card-box">
	<div class="card-list image">
		<span class="list-cover" style="background-image: url('{{user.getPhoto()}}')"></span>
		<h5 class="list-name">{{ link_to(['for': 'user-profile', 'id': user.id], user.getFullname()) }}</h5>
		<div class="list-description">{{ user.about }}</div>
		<div class="list-info">
			{% if user.countResume() %}
				<span>{{ user.countResume() }} резюме</span>
			{% endif %}
			{% if !user.countResume() %}
				<span>Нет резюме</span>
			{% endif %}
			{% if user.age %}
				<span>{{ user.age }} лет</span>
			{% endif %}
			{% if user.location %}
				<span>{{ user.location }}</span>
			{% endif %}
		</div>
	</div>
</div>
<div class="card-box">
	<div class="card-list">
		<h5 class="list-name">{{ link_to(['for': 'resume-link', 'hash': resume.hash], resume.name) }} <b class="right">{{ resume.getPrice() }}</b></h5>
		<div class="list-description">{{ resume.getResumeActivity().name }} • {{ resume.getUser().location }} • {{ resume.getResumeSchedule().name }}</div>
		<div class="list-info">
			<span>{{ resume.getDate() }}</span>
			<span>{{ link_to(['for': 'user-profile', 'id': resume.getUser().id], resume.getUser().getFullname()) }}, {{ resume.getUser().getAge() }}</span>
			{% if resume.user_id == auth.getId() %}
				<span>{{ link_to(['for': 'resume-edit', 'hash': resume.hash], 'Изменить') }}</span>
				<span>{{ link_to(['for': 'resume-delete', 'hash': resume.hash], 'Удалить') }}</span>
			{% endif %}
		</div>
	</div>
</div>
<div class="middle">
	<div class="card-name">Уведомления</div>
	{% if user.hasNotify() %}
		{% for notification in user.getNotify() %}
			<div class="card-box">
				<div class="card-list">
					<div class="list-description">{{ notification.text }}</div>
					<div class="list-info">
						<span>{{ notification.getDate() }}</span>
						<span>{{ notification.getType() }}</span>
					</div>
				</div>
			</div>
		{% endfor %}
		<div class="card-box">
			<div class="card-button">
				{{ link_to(['for': 'notify-clear'], 'Отчистить уведомления', 'class': 'btn btn-danger') }}
			</div>
		</div>
	{% endif %}
	{% if !user.hasNotify() %}
		<p>У вас нет уведомлений</p>
	{% endif %}
</div>

<div class="clearfix"></div>

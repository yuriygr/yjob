<div class="main left">
	{% for article in articles.items %}
		{{ partial("block/article") }}
	{% endfor %}
	{% if articles.first != articles.total_pages %}
		<div class="card-box">
			<div class="card-content paginator">

				{% if articles.current != articles.first %}
					{% set pageBefore = ['for': 'article-page', 'page': articles.before] %}
					{{ link_to(pageBefore, '<i class="fa fa-angle-double-left"></i> Предыдущая', 'class': 'paginator-item left' , 'rel': 'prev') }}
				{% endif %}

				{% if articles.current != articles.last %}
					{% set pageNext = ['for': 'article-page', 'page': articles.next] %}
					{{ link_to(pageNext, 'Следующая <i class="fa fa-angle-double-right"></i>', 'class': 'paginator-item right' , 'rel': 'next') }}
				{% endif %}
			<div class="clearfix"></div>
			</div>
		</div>
	{% endif %}
</div>

<div class="clearfix"></div>
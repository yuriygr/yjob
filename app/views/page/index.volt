<div class="card-box">
	<div class="card-feature">

		<div class="feature-box"><a href="{{ url(['for': 'vacancy-home']) }}?type=full">
			<div class="feature-img" style="background-image: url('https://pp.vk.me/c630317/v630317997/288ca/ijgQHmDJmLc.jpg');"></div>
			<div class="feature-title">Постоянная</div>
		</a></div>

		<div class="feature-box"><a href="{{ url(['for': 'vacancy-home']) }}?type=home">
			<div class="feature-img" style="background-image: url('https://pp.vk.me/c630317/v630317997/288ca/ijgQHmDJmLc.jpg');"></div>
			<div class="feature-title">На дому</div>
		</a></div>

		<div class="feature-box"><a href="{{ url(['for': 'vacancy-home']) }}?type=noop">
			<div class="feature-img" style="background-image: url('https://pp.vk.me/c630317/v630317997/288ca/ijgQHmDJmLc.jpg');"></div>
			<div class="feature-title">Без опыта</div>
		</a></div>

		<div class="feature-box"><a href="{{ url(['for': 'vacancy-home']) }}?type=timed">
			<div class="feature-img" style="background-image: url('https://pp.vk.me/c630317/v630317997/288ca/ijgQHmDJmLc.jpg');"></div>
			<div class="feature-title">Временная</div>
		</a></div>

		<div class="feature-box"><a href="{{ url(['for': 'vacancy-home']) }}?type=vaht">
			<div class="feature-img" style="background-image: url('https://pp.vk.me/c630317/v630317997/288ca/ijgQHmDJmLc.jpg');"></div>
			<div class="feature-title">Вахтовая</div>
		</a></div>

		<div class="clearfix"></div>
	</div>
</div>


<div class="main left">
	<h5>Недавние статьи</h5>
	{% for article in articles %}
		{{ partial("block/article") }}
	{% endfor %}
	<div class="card-box">
		<div class="card-button">
			{{ link_to(['for': 'article-home'], 'Все статьи', 'class': 'btn btn-white' ) }}
		</div>
	</div>
</div>
<div class="clearfix"></div>
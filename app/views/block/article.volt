<div class="card-box">
<a href="{{ url(['for': 'article-link', 'slug': article.slug]) }}">
	<div class="card-article">
		<div class="article-header">
			{{ image(article.getImage(), 'alt': article.getName(), 'class': 'image') }}
			<div class="title">«{{ article.getName() }}»</div>	
			<div class="meta"><i class="fa fa-clock-o"></i> {{ article.getDate() }}</div>
		</div>		
	</div>
</a>
</div>
<div class="main left">
	<div class="card-box">
		<div class="article-header">
			{{ image(article.getImage(), 'alt': article.getName(), 'class': 'image') }}
			<div class="title">«{{ article.getName() }}»</div>	
			<div class="meta"><i class="fa fa-clock-o"></i> {{ article.getDate() }}</div>
		</div>
	</div>
	{{ partial("common/share") }}
	<div class="card-box">
		<div class="article-content">{{ article.getContent() }}</div>
	</div>
</div>

<div class="clearfix"></div>
<div class="card-box">
	<div class="card-search">
		<div class="search-icon"><i class="fa fa-search"></i></div>
		{{ text_field('global_search_bar', 'class': 'search-input', 'data-filter-input': 'true', 'placeholder': 'Например, ' ~ filter_exemple, 'value': filter_query) }}
	</div>
</div>
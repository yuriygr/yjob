<header>
<div class="warp">
	<span class="logo left">
		{{ link_to(['for': 'home-link'], image('/images/logo.png', 'alt': config.site.title)) }}
	</span>
	<ul class="header-menu left">
		<li class="header-menu-item">{{ link_to(['for': 'vacancy-home'], 'Вакансии') }}</li>
		<li class="header-menu-item">{{ link_to(['for': 'resume-home'], 'Резюме') }}</li>
		<li class="header-menu-item">{{ link_to(['for': 'company-home'], 'Компании') }}</li>
		<li class="header-menu-item">{{ link_to(['for': 'user-home'], 'Соискатели') }}</li>
	</ul>
	{% if !auth.isLogin() %}
	<ul class="header-menu right">
		<li class="header-menu-item">{{ link_to(['for': 'user-login'], 'Вход') }}</li>
	</ul>
	{% endif %}
	{% if auth.isLogin() %}
	<div class="header-button right">
		<a href="{{ url(['for': 'notify-home']) }}">
			<i class="fa fa-bell"></i>
			{% if currentUser.hasNotify() %}<span class="button-count">{{ currentUser.countNotify() }}</span>{% endif %}
		</a>
		<a href="{{ url(['for': 'settings-profile']) }}">
			<i class="fa fa-cogs"></i>
		</a>
		<a href="{{ url(['for': 'user-logout']) }}">
			<i class="fa fa-sign-out"></i>
		</a>
	</div>
	<div class="header-userbar right">
		<a href="{{ url(['for': 'user-profile', 'id': currentUser.id]) }}">
			<img class="userbar-photo" src="{{ currentUser.getPhoto() }}">
			<span class="userbar-name">{{ currentUser.firstname }}</span>
		</a>
	</div>
	{% endif %}
	<div class="clearfix"></div>
</div>
</header>
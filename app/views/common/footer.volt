<footer>
{% if router.getControllerName() == "page" and router.getActionName() == "index"  %}
<div class="footer-social">
	<div class="warp">
		<h4>Присоединяйтесь к нам в сети</h4>
		<a class="vk" href="https://vk.com/{{ config.social.vk }}" target="_blank" rel="nofollow"><!--
			--><i class="fa fa-vk fa-2x"></i><!--
		--></a>
		<a class="ok" href="https://ok.ru/{{ config.social.odnoklassniki }}" target="_blank" rel="nofollow"><!--
			--><i class="fa fa-odnoklassniki fa-2x"></i><!--
		--></a>
		<a class="fb" href="https://fb.com/{{ config.social.facebook }}" target="_blank" rel="nofollow"><!--
			--><i class="fa fa-facebook fa-2x"></i><!--
		--></a>
		<a class="tg" href="https://telegram.me/{{ config.social.telegram }}" target="_blank" rel="nofollow"><!--
			--><i class="fa fa-send-o fa-2x"></i><!--
		--></a>
		<a class="yt" href="https://www.youtube.com/channel/{{ config.social.youtube }}" target="_blank" rel="nofollow"><!--
			--><i class="fa fa-youtube-square fa-2x"></i><!--
		--></a>
		<a class="tw" href="https://twitter.com/{{ config.social.twitter }}" target="_blank" rel="nofollow"><!--
			--><i class="fa fa-twitter fa-2x"></i><!--
		--></a>
	</div>
</div>
{% endif %}
<div class="footer-bottom">
	<div class="warp">
		<p class="footer-copyright">{{ date('Y') }} &copy; {{ link_to(['for': 'home-link'], config.site.title) }} — поможет вам найти работу. Большой выбор вакансий с требованиями и без, работа по специальности, работа для учащихся и т.д. Все это Вы сможете найти на нашем сайте.<br>Заполнить резюме и подобрать для себя интересные вакансии можно в любой момент! Использование сайта означает согласие с {{ link_to(['for': 'page-link', 'slug': 'terms'], 'пользовательским соглашением') }}.</p>
		<p class="footer-statistics">
			Сейчас на сайте {{ link_to(['for': 'vacancy-home'], countVacancy ) }} вакансий, {{ link_to(['for': 'resume-home'], countResume) }} резюме и {{ link_to(['for': 'user-home'], countUser) }} пользователей
		</p>
		<ul class="footer-menu">
			<li>{{ link_to(['for': 'vacancy-home'], 'Вакансии') }}</li>
			<li>{{ link_to(['for': 'resume-home'], 'Резюме') }}</li>
			<li>{{ link_to(['for': 'article-home'], 'Статьи') }}</li>
			<li>{{ link_to(['for': 'page-link', 'slug': 'help'], 'Помощь') }}</li>
			<li>{{ link_to(['for': 'page-link', 'slug': 'about'], 'О нас') }}</li>
		</ul>
	</div>
</div>
</footer>
<script type="text/javascript">
(function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter36972705 = new Ya.Metrika({ id:36972705, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true, ecommerce:"dataLayer" }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks");
</script>
{{ tag.getDocType() }}
<html lang="ru">
<head prefix="og: http://ogp.me/ns#">
	{{ tag.getCharset() }}
	{{ tag.getFavicon() }}	
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta name="HandheldFriendly" content="true">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="apple-touch-icon" sizes="57x57" href="/assets/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/assets/apple-touch-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/assets/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/assets/apple-touch-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/assets/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/assets/apple-touch-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/assets/apple-touch-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/assets/apple-touch-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/assets/apple-touch-icon-180x180.png">
	<link rel="icon" type="image/png" href="/assets/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="/assets/favicon-96x96.png" sizes="96x96">
	<link rel="icon" type="image/png" href="/assets/favicon-16x16.png" sizes="16x16">
	<link rel="manifest" href="/assets/manifest.json">
	<meta name="apple-mobile-web-app-title" content="yJob">
	<meta name="application-name" content="yJob">
	<meta name="msapplication-TileColor" content="#3197D1">
	<meta name="msapplication-TileImage" content="/assets/mstile-144x144.png">
	<meta name="theme-color" content="#ffffff">
	
	<!-- Meta Tags -->
	{{ tag.getTitle() }}
	{{ tag.getDescription() }}
	{{ tag.getKeywords() }}
	
	<!-- Open Graph -->
	{{ og.output() }}
	
	<!-- Assets -->
	{{ assets.outputCss() }}
	{{ assets.outputJs() }}

</head>
<body>

{{ partial("common/header") }}

{{ flashSession.output() }}

{% if router.getControllerName() == "page" and router.getActionName() == "index" %}
	{{ partial("common/hello") }}
{% endif %}

{{ partial("common/content") }}

{{ partial("common/footer") }}

</body>
</html>
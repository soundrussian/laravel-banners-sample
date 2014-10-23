<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Баннеры в Laravel</title>
	<style>
		@import url(//fonts.googleapis.com/css?family=Lato:700);

		body {
			margin:0;
			font-family:'Lato', sans-serif;
			text-align:center;
			color: #999;
		}

		.welcome {
			width: 300px;
			height: 70px;
			position: absolute;
			left: 50%;
			top: 50%;
			margin-left: -150px;
			margin-top: -35px;
		}

		a, a:visited {
			text-decoration:none;
		}

		h1 {
			font-size: 32px;
			margin: 16px 0 0 0;
		}

		.banners-top {
			width: 960px;
			position: absolute;
			top: 0;
			left: 50%;
			margin-left: -480px;
		}

		.banners-bottom {
			width: 960px;
			position: absolute;
			bottom: 0;
			left: 50%;
			margin-left: -480px;
			overflow: auto;
		}

		.banner {
			display: block;
			float: left;
		}

		.banners-top .banner {
			height: 150px;
			width: 480px;
		}

		.banners-bottom .banner {
			height: 70px;
			width: 320px;
		}
	</style>
</head>
<body>
	<div class="banners-top">
		@foreach($banners as $banner)
			<a href="{{$banner->url}}" class="banner" target="_blank">{{$banner->content}}</a>
		@endforeach
	</div>
	<div class="welcome">
		<h1>Баннеры в Laravel.</h1>
	</div>
	<div class="banners-bottom">
		@foreach($bottom_banners as $banner)
			<a href="{{$banner->url}}" class="banner" target="_blank">{{$banner->content}}</a>
		@endforeach
	</div>
</body>
</html>

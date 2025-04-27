<?php if (isset($isRender) && $isRender): ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>main</title>
		@includeMorph
		@includeNamedRoutes
		<style>
			{{{file_get_contents(base_path('app/core/meld/css/sidebar.css'))}}}
			{{{file_get_contents(base_path('app/core/meld/css/content.css'))}}}
			{{{file_get_contents(base_path('app/core/meld/css/panel.css'))}}}
		</style>
	</head>
	<body>


		<morph name="Home" role="content">
			<h1> Home page </h1>
		</morph>

		@loop($pages, "page")
		<morph role="content" name="{{page[0]}}" customBackload="{{page[1]}}" backloadType="{{page[2]}}"></morph>
		@endloop

		<morph name="sidebar" role="sidebar">
			<br>
			<button onclick="Morph.goTo('Home')">Home</button>
			@loop($pages, "page")
			<button onclick="Morph.goTo(`{{page[0]}}`)">{{page[0]}}</button>
			@endloop
		</morph>

		<morph name="panel" role="panel" onclick="toggleSideBar()"><button>Menu</button></morph>

		<script>
			function toggleSideBar(){
				if (Morph.currentPage === Morph.morphs.sidebar) {
					history.back();
				} else {
					Morph.goTo('sidebar');
				}
			}
		</script>
	</body>
</html>
<?php endif; ?>

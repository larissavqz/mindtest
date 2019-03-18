<!DOCTYPE html>
<html>
	@include("pages.head")
<body>
	@include("pages.menu")
	<div class="container">
		@yield('content')
	</div>
	<div class="container">
		@include("pages.footer")
	</div>	
</body>
</html>
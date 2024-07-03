<!DOCTYPE html>
<html lang="en">

<head>
	@include('manager.css')
</head>

<body>
	<div class="wrapper">
		@include('manager.sidebar')

		<div class="main">
			@include('manager.navbar')

			<main class="content">
				<div class="container-fluid p-0">

					@include('manager.chart')
			</main>

			<footer class="footer">
				@include('manager.footer')
			</footer>
		</div>
	</div>

	@include('manager.js')

</body>

</html>
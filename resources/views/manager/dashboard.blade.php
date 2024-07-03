<!DOCTYPE html>
<html lang="en">

<head>
	@include('inventaris.css')
</head>

<body>
	<div class="wrapper">
		@include('inventaris.sidebar')

		<div class="main">
			@include('inventaris.navbar')

			<main class="content">
				<div class="container-fluid p-0">

					@include('inventaris.chart')
			</main>

			<footer class="footer">
				@include('inventaris.footer')
			</footer>
		</div>
	</div>

	@include('manager.js')

</body>

</html>
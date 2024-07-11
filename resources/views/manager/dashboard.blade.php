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
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			 var ctx = document.getElementById('bestSellingProductsChart').getContext('2d');
			 var topProducts = @json($topProducts);
			 var productNames = topProducts.map(function(product) { return product.product_name; });
			 var productQuantities = topProducts.map(function(product) { return product.total_quantity; });
	
			 var bestSellingProductsChart = new Chart(ctx, {
				  type: 'doughnut',
				  data: {
						labels: productNames,
						datasets: [{
							 label: 'Jumlah Produksi',
							 data: productQuantities,
							 backgroundColor: ['#2d3436', '#636e72', '#b2bec3'],
							 borderColor: ['#2d3436', '#636e72', '#b2bec3'],
							 borderWidth: 1
						}]
				  },
				  options: {
						responsive: true,
						maintainAspectRatio: false,
						plugins: {
							 legend: {
								  display: false
							 },
							 title: {
								  display: true,
								  text: 'Produksi Produk Populer'
							 }
						}
				  }
			 });
		// Mengupdate teks legenda
		productNames.forEach(function(name, index) {
					document.getElementById('legend-item-' + index).textContent = name + ' ' + productQuantities[index];
			  });
		 });
	</script>

<script>
	document.addEventListener("DOMContentLoaded", function() {
		 var monthlyOrders = @json($monthlyOrders);
		 var labels = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
		 var data = [];

		 for (var i = 1; i <= 12; i++) {
			  data.push(monthlyOrders[i] || 0);
		 }

		 new Chart(document.getElementById("chartjs-dashboard-bar"), {
			  type: "bar",
			  data: {
					labels: labels,
					datasets: [{
						 label: "This year",
						 backgroundColor: '#2d3436',
						 borderColor: '#2d3436',
						 hoverBackgroundColor: '#2d3436',
						 hoverBorderColor: '#2d3436',
						 data: data,
						 barPercentage: .75,
						 categoryPercentage: .5
					}]
			  },
			  options: {
					maintainAspectRatio: false,
					legend: {
						 display: false
					},
					scales: {
						 yAxes: [{
							  gridLines: {
									display: false
							  },
							  stacked: false,
							  ticks: {
									stepSize: 20
							  }
						 }],
						 xAxes: [{
							  stacked: false,
							  gridLines: {
									color: "transparent"
							  }
						 }]
					}
			  }
		 });
	});
</script>
</body>

</html>
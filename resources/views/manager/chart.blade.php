<div class="py-3">
	<h1 class="title-pag">Statistik Produksi</h1>
</div>

<div class="row">
	<div class="col-xl-6 col-xxl-5 d-flex">
		<div class="w-100">
			<div class="row">
				<div class="col-sm-6">
					<div class="card dibi">
						<div class="card-body">
							<div class="row">
								<div class="col mt-0">
									<h5 class="card-title">Total Pesanan</h5>
								</div>
								<div class="col-auto">
									<span class="material-symbols-outlined align-middle icon-size">
										shopping_bag
									</span>
								</div>
							</div>
							<div class="price">
								<h1 class="mt-1 mb-3"></h1>
							</div>
							<div class="price">
								<h1 class="mt-1 mb-3">{{ $totalOrders }}</h1>
							</div>
						</div>
					</div>
					<div class="card dibi">
						<div class="card-body">
							<div class="row">
								<div class="col mt-0">
									<h5 class="card-title">Total Produk</h5>
								</div>
								<div class="col-auto">
									<span class="material-symbols-outlined align-middle icon-size">
										shopping_bag
									</span>
								</div>
							</div>
							<div class="price">
								<h1 class="mt-1 mb-3"></h1>
							</div>
							<div class="price">
								<h1 class="mt-1 mb-3">{{ $totalProducts }}</h1>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="card dibi">
						<div class="card-body">
							<div class="row">
								<div class="col mt-0">
									<h5 class="card-title">Total Produksi</h5>
								</div>
								<div class="col-auto">
									<span class="material-symbols-outlined align-middle icon-size">
										receipt
									</span>
								</div>
							</div>
							<div class="price">
								<h1 class="mt-1 mb-3"></h1>
							</div>
							<div class="price">
								<h1 class="mt-1 mb-3">{{ $totalProduction }}</h1>
							</div>
						</div>
					</div>
					<div class="card dibi">
						<div class="card-body">
							<div class="row">
								<div class="col mt-0">
									<h5 class="card-title">Subkontraktor</h5>
								</div>
								<div class="col-auto">
									<span class="material-symbols-outlined align-middle icon-size">
										person
									</span>
								</div>
							</div>
							<div class="price mb-0">
								<h1 class="mt-1 mb-3"></h1>
							</div>
							<div class="price mb-0">
								<h1 class="mt-1 mb-3">{{ $totalSubcontractors }}</h1>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-xl-6 col-xxl-7">
		<div class="card flex-fill w-100 dibi">
			<div class="card-header">
				<h5 class="card-title mb-0">Produksi Produk Populer</h5>
			</div>
			<div class="card-body chart chart-sm" style="display: flex;">
				<div class="chart-container">
					<canvas id="bestSellingProductsChart"></canvas>
				</div>
				<div class="legend-container">
					<div class="legend-item">
						<div class="legend-color" style="background-color: #2d3436;"></div>
						<span id="legend-item-0"></span>
					</div>
					<div class="legend-item">
						<div class="legend-color" style="background-color: #636e72;"></div>
						<span id="legend-item-1"></span>
					</div>
					<div class="legend-item">
						<div class="legend-color" style="background-color: #b2bec3;"></div>
						<span id="legend-item-2"></span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-12 col-lg-6 col-xxl-6 d-flex">
		<div class="card flex-fill w-100">
			<div class="card-header">
				<h5 class="card-title mb-0">Penjualan Bulanan</h5>
			</div>
			<div class="card-body d-flex w-100">
				<div class="align-self-center chart chart-lg">
					<canvas id="chartjs-dashboard-bar"></canvas>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-lg-6 col-xxl-6 d-flex">
		<div class="card flex-fill w-100">
			<div class="card-header">
				<h5 class="card-title mb-0">Calendar</h5>
			</div>
			<div class="card-body d-flex">
				<div class="align-self-center w-100">
					<div class="chart">
						<div id="datetimepicker-dashboard"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

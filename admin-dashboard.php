<?php
include_once('connection.php');
session_start();

if(isset($_SESSION['auth_user']))
{
	?>
	<!DOCTYPE html>
	<html lang="en">

	<?php include 'layouts/head.php'; ?>
	<body class="loading">
		<div id="wrapper">
			<?php include 'layouts/header.php'; ?>
			<?php include 'layouts/sider-bar.php'; ?>
			<div class="content-page">
				<div class="content">
					<div class="container-fluid">
						<div class="row mt-3">
							<div class="col-md-6 col-xl-3">
								<div class="widget-rounded-circle card">
									<div class="card-body">
										<div class="row">
											<div class="col-6">
												<div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
													<i class="fe-heart font-22 avatar-title text-primary"></i>
												</div>
											</div>
											<div class="col-6">
												<div class="text-end">
													<h3 class="text-dark mt-1">$<span data-plugin="counterup">58,947</span></h3>
													<p class="text-muted mb-1 text-truncate">Total Revenue ksdfjs</p>
												</div>
											</div>
										</div> <!-- end row-->
									</div>
								</div> <!-- end widget-rounded-circle-->
							</div> <!-- end col-->

							<div class="col-md-6 col-xl-3">
								<div class="widget-rounded-circle card">
									<div class="card-body">
										<div class="row">
											<div class="col-6">
												<div class="avatar-lg rounded-circle bg-soft-success border-success border">
													<i class="fe-shopping-cart font-22 avatar-title text-success"></i>
												</div>
											</div>
											<div class="col-6">
												<div class="text-end">
													<h3 class="text-dark mt-1"><span data-plugin="counterup">127</span></h3>
													<p class="text-muted mb-1 text-truncate">Today's Sales</p>
												</div>
											</div>
										</div> <!-- end row-->
									</div>
								</div> <!-- end widget-rounded-circle-->
							</div> <!-- end col-->

							<div class="col-md-6 col-xl-3">
								<div class="widget-rounded-circle card">
									<div class="card-body">
										<div class="row">
											<div class="col-6">
												<div class="avatar-lg rounded-circle bg-soft-info border-info border">
													<i class="fe-bar-chart-line- font-22 avatar-title text-info"></i>
												</div>
											</div>
											<div class="col-6">
												<div class="text-end">
													<h3 class="text-dark mt-1"><span data-plugin="counterup">0.58</span>%</h3>
													<p class="text-muted mb-1 text-truncate">Conversion</p>
												</div>
											</div>
										</div> <!-- end row-->
									</div>
								</div> <!-- end widget-rounded-circle-->
							</div> <!-- end col-->

							<div class="col-md-6 col-xl-3">
								<div class="widget-rounded-circle card">
									<div class="card-body">
										<div class="row">
											<div class="col-6">
												<div class="avatar-lg rounded-circle bg-soft-warning border-warning border">
													<i class="fe-eye font-22 avatar-title text-warning"></i>
												</div>
											</div>
											<div class="col-6">
												<div class="text-end">
													<h3 class="text-dark mt-1"><span data-plugin="counterup">78.41</span>k</h3>
													<p class="text-muted mb-1 text-truncate">Today's Visits</p>
												</div>
											</div>
										</div> <!-- end row-->
									</div>
								</div> <!-- end widget-rounded-circle-->
							</div> <!-- end col-->
						</div>
						<div class="row">
							<div class="col-lg-4">
								<div class="card">
									<div class="card-body">
										<div class="dropdown float-end">
											<a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
												<i class="mdi mdi-dots-vertical"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-end">
												<!-- item-->
												<a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
												<!-- item-->
												<a href="javascript:void(0);" class="dropdown-item">Export Report</a>
												<!-- item-->
												<a href="javascript:void(0);" class="dropdown-item">Profit</a>
												<!-- item-->
												<a href="javascript:void(0);" class="dropdown-item">Action</a>
											</div>
										</div>

										<h4 class="header-title mb-0">Total Revenue</h4>

										<div class="widget-chart text-center" dir="ltr">

											<div id="total-revenue" class="mt-0"  data-colors="#f1556c"></div>

											<h5 class="text-muted mt-0">Total sales made today</h5>
											<h2>$178</h2>

											<p class="text-muted w-75 mx-auto sp-line-2">Traditional heading elements are designed to work best in the meat of your page content.</p>

											<div class="row mt-3">
												<div class="col-4">
													<p class="text-muted font-15 mb-1 text-truncate">Target</p>
													<h4><i class="fe-arrow-down text-danger me-1"></i>$7.8k</h4>
												</div>
												<div class="col-4">
													<p class="text-muted font-15 mb-1 text-truncate">Last week</p>
													<h4><i class="fe-arrow-up text-success me-1"></i>$1.4k</h4>
												</div>
												<div class="col-4">
													<p class="text-muted font-15 mb-1 text-truncate">Last Month</p>
													<h4><i class="fe-arrow-down text-danger me-1"></i>$15k</h4>
												</div>
											</div>

										</div>
									</div>
								</div> <!-- end card -->
							</div> <!-- end col-->

							<div class="col-lg-8">
								<div class="card">
									<div class="card-body pb-2">
										<div class="float-end d-none d-md-inline-block">
											<div class="btn-group mb-2">
												<button type="button" class="btn btn-xs btn-light">Today</button>
												<button type="button" class="btn btn-xs btn-light">Weekly</button>
												<button type="button" class="btn btn-xs btn-secondary">Monthly</button>
											</div>
										</div>

										<h4 class="header-title mb-3">Sales Analytics</h4>

										<div dir="ltr">
											<div id="sales-analytics" class="mt-4" data-colors="#1abc9c,#4a81d4"></div>
										</div>
									</div>
								</div> <!-- end card -->
							</div> <!-- end col-->
						</div>
					</div>
				</div>
			</div>
			<?php include 'layouts/footer.php'; ?>
		</div>

		<?php include 'layouts/scripts.php'; ?>


	</body>
	</html>
	<?php
}
else
{
	header('Location: index.php');
}

?>


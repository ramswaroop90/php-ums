<?php
session_start();
include_once('connection.php');

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
					<div class="container-fluid mt-3">
						<div class="row">
							<div class="col-12">
								<div class="card">
									<div class="card-header bg-info">
										<div class="row">
											<div class="col-md-6">
												<h3>Customers List</h3>
											</div>
										</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-centered table-nowrap table-striped" id="products-datatable">
												<thead>
													<tr>
														<th style="width: 20px;">
															<div class="form-check">
																<input type="checkbox" class="form-check-input" id="customCheck1">
																<label class="form-check-label" for="customCheck1">&nbsp;</label>
															</div>
														</th>
														<th>Customer</th>
														<th>Phone</th>
														<th>Email</th>
														<th>Location</th>
														<th>Create Date</th>
														<th>Status</th>
														<th style="width: 85px;">Action</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$query="SELECT *from users where type ='customer';";
													$users = $conn->query($query);
													if ($users->num_rows > 0)
													{
														while($user = $users->fetch_object())
														{
															?>
															<tr>
																<td>
																	<div class="form-check">
																		<input type="checkbox" class="form-check-input" id="customCheck2">
																		<label class="form-check-label" for="customCheck2">&nbsp;</label>
																	</div>
																</td>
																<td class="table-user">
																	<img src="assets/images/users/user-4.jpg" alt="table-user" class="me-2 rounded-circle">
																	<a href="javascript:void(0);" class="text-body fw-semibold"><?php echo $user->first_name.' '.$user->last_name ?></a>
																</td>
																<td>
																	937-330-1634
																</td>
																<td>
																	<?php echo $user->email ?>
																</td>
																<td>
																	New York
																</td>
																<td>
																	<?php echo  $user->created_at;?>
																</td>
																<td>
																	<?php
																	if($user->status)
																	{
																		echo '<span class="badge bg-soft-success text-success">Active</span>';
																	}
																	else
																	{
																		echo '<span class="badge bg-soft-danger text-danger">Inactive</span>';
																	}
																	?>

																</td>

																<td>
																	<a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
																	<a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
																</td>
															</tr>
															<?php
														}
													}
													else
													{
														echo "0 results";
													}
													?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
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


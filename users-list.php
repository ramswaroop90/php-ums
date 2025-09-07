<?php
session_start();
include_once('connection.php');

$query="SELECT *from users where type ='support'";
$total_users = $conn->query($query);
$pages=0;
$total_records=0;
$records_per_page=4;
$page_no=isset($_GET['page']) && $_GET['page']>=1 ? $_GET['page'] : 1;
$offset=0;

if ($total_users->num_rows > 0)
{
	$total_records=$total_users->num_rows;
	$total_pages=ceil($total_records/$records_per_page);
	$offset = ($page_no-1) * $records_per_page;
}

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
								<?php include 'layouts/flash-message.php'; ?>
								<div class="card">
									<div class="card-header bg-info">
										<div class="row">
											<div class="col-md-6">
												<h3>Support User List</h3>
											</div>
											<div class="col-md-6">
												<a type="button" class="btn btn-danger waves-effect waves-light float-end" href="add-user.php"><i class="mdi mdi-plus-circle me-1"></i> Add Users</a>
											</div>
										</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-centered table-nowrap table-striped" id="products-datatable">
												<thead>
													<tr>
														<th style="width: 20px;">#</th>
														<th>User</th>
														<th>Email</th>
														<th>Mobile</th>
														<th>Status</th>
														<th>Create At</th>
														<th style="width: 85px;">Action</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$query="SELECT *from users where type ='support' LIMIT $offset, $records_per_page";
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
																	</div>
																</td>
																<td class="table-user">
																	<img src="assets/images/users/user-4.jpg" alt="table-user" class="me-2 rounded-circle">
																	<a href="javascript:void(0);" class="text-body fw-semibold"><?php echo $user->first_name.' '.$user->last_name ?></a>
																</td>
																<td>
																	<?php echo $user->email ?>
																</td>
																<td>
																	<?php echo $user->mobile ?? '+91-XXXXXXXXXX' ?>
																</td>
																<td>
																	<?php
																	if($user->status)
																	{
																		echo '<a href="change-status.php?id='.$user->id.'"><span class="badge bg-success text-white rounded-pill px-1">Active</span></a>';
																	}
																	else
																	{
																		echo '<a href="change-status.php?id='.$user->id.'"><span class="badge bg-danger text-danger rounded-pill px-1">Inactive</span></a>';
																	}
																	?>

																</td>
																<td>
																	<?php echo  $user->created_at;?>
																</td>
																<td>
																	<a href="edit-user.php?id=<?php echo $user->id; ?>" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
																	<a href="delete-user.php?id=<?php echo $user->id; ?>" class="action-icon" onclick="return confirm('Are you sure to delete this user?')"> <i class="mdi mdi-delete"></i></a>
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
										<?php
										if($total_pages>1)
										{
											?>
											<ul class="pagination pagination-rounded justify-content-end mb-0">
												<li class="page-item">
													<a class="page-link" href="?page=<?php echo ($page_no-1) ?>" aria-label="Previous">
														<span aria-hidden="true">«</span>
														<span class="visually-hidden">Previous</span>
													</a>
												</li>
												<?php
												for($i=1;$i<=$total_pages; $i++)
												{
													$active=$page_no==$i ? 'active':'';
													echo '<li class="page-item '.$active.'"><a class="page-link" href="?page='.$i.'">'.$i.'</a></li>';
												}
												?>
												<li class="page-item">
													<a class="page-link" href="?page=<?php echo ($page_no+1) ?>" aria-label="Next">
														<span aria-hidden="true">»</span>
														<span class="visually-hidden">Next</span>
													</a>
												</li>
											</ul>
											<?php
										}
										?>


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


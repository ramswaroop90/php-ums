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
								<?php include 'layouts/flash-message.php'; ?>
								<div class="card">
									<div class="card-header bg-info">
										<div class="row">
											<div class="col-md-6">
												<h3>Categories List</h3>
											</div>
											<div class="col-md-6">
												<a type="button" class="btn btn-danger waves-effect waves-light float-end" href="add-category.php"><i class="mdi mdi-plus-circle me-1"></i> Add Category</a>
											</div>
										</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-centered table-nowrap table-striped" id="products-datatable">
												<thead>
													<tr>
														<th style="width: 20px;">#</th>
														<th>Name</th>
														<th>Name Alias</th>
														<th>Status</th>
														<th>Create At</th>
														<th style="width: 85px;">Action</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$query="SELECT *from categories;";
													$categories = $conn->query($query);
													if ($categories->num_rows > 0)
													{
														$index=1;
														while($category = $categories->fetch_object())
														{
															?>
															<tr>
																<td><?php echo $index++; ?></td>
																<td class="table-user">
																	<img src="uploads/<?php echo $category->image; ?>" alt="table-user" class="me-2 rounded-circle">
																	<a href="javascript:void(0);" class="text-body fw-semibold"><?php echo $category->name ?></a>
																</td>
																<td>
																	<?php echo $category->name_alias ?>
																</td>
																<td>
																	<?php
																	if($category->status)
																	{
																		echo '<a href="change-category-status.php?id='.$category->id.'" onclick="return confirm("Are you sure to Activate this category?")"><span class="badge bg-success text-white rounded-pill px-1">Active</span></a>';
																	}
																	else
																	{
																		echo '<a href="change-category-status.php?id='.$category->id.'" onclick="return confirm("Are you sure to Deactivate this category?")"><span class="badge bg-danger text-white rounded-pill px-1">Inactive</span></a>';
																	}
																	?>
																</td>
																<td>30-Aug-2025</td>
																<td>
																	<a href="edit-category.php?id=<?php echo $category->id; ?>" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
																	<a href="delete-category.php?id=<?php echo $category->id; ?>" class="action-icon" onclick="return confirm('Are you sure to delete this category?')"> <i class="mdi mdi-delete"></i></a>
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


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
												<h3>Add Category Details</h3>
											</div>
											<div class="col-md-6">
												<a type="button" class="btn btn-secondary waves-effect waves-light float-end" href="categories-list.php"><i class="mdi mdi-plus-circle me-1"></i> Back</a>
											</div>
										</div>
									</div>
									<div class="card-body">
										<div class="row d-flex justify-content-center">
											<div class="col-md-6">
												<form class="px-3" action="save-category.php" method="POST" enctype="multipart/form-data">
													<div class="mb-3">
														<label class="form-label">Name</label>
														<input class="form-control" type="text" name="name" required="" placeholder="Type Category Name">
														<?php
														if(isset($_SESSION['errors']['name']))
														{
															echo '<span class="text-danger">'.$_SESSION['errors']['name'].'</span>';
														}
														?>
													</div>

													<div class="mb-3">
														<label class="form-label">Status</label>
														<select class="form-control" name="status">
															<option value="">--Select--</option>
															<option value="1">Active</option>
															<option value="0">Inactive</option>
														</select>
														<?php
														if(isset($_SESSION['errors']['status']))
														{
															echo '<span class="text-danger">'.$_SESSION['errors']['status'].'</span>';
														}
														?>
													</div>

													<div class="mb-3">
														<label class="form-label">Upload Image</label>
														<input class="form-control" type="file" name="image" required="">
														<?php
														if(isset($_SESSION['errors']['image']))
														{
															echo '<span class="text-danger">'.$_SESSION['errors']['image'].'</span>';
														}
														?>
													</div>

													<div class="mb-3 text-end">
														<button class="btn btn-primary" type="submit" name="save-category" value="save-category">Save</button>
													</div>
												</form>
											</div>
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


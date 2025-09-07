<?php
session_start();
include_once('connection.php');


$category_id=$_GET['id'];

$stmt = $conn->prepare("SELECT *from categories where id=?");
$stmt->bind_param("i", $category_id);
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();
$category=$result->fetch_object();


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
												<h3>Edit Category Details</h3>
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
														<input class="form-control" type="text" name="name" value="<?php echo $category->name; ?>" required="" placeholder="Type Category Name">
														<?php
														if(isset($_SESSION['errors']['name']))
														{
															echo '<span class="text-danger">'.$_SESSION['errors']['name'].'</span>';
															unset($_SESSION['errors']['name']);
														}
														?>
													</div>

													<div class="mb-3">
														<label class="form-label">Status</label>
														<select class="form-control" name="status">
															<option value="">--Select--</option>
															<?php
															$selected=$category->status ? 'selected' : '';
															$notselected=!$category->status ? 'selected' : '';
															?>
															<option <?php echo $selected ?>  value="1">Active</option>
															<option <?php echo $notselected ?>  value="0">Inactive</option>
														</select>
														<?php
														if(isset($_SESSION['errors']['status']))
														{
															echo '<span class="text-danger">'.$_SESSION['errors']['status'].'</span>';
															unset($_SESSION['errors']['status']);
														}
														?>
													</div>

													<div class="mb-3">
														<label class="form-label">Parent Category</label>
														<select class="form-control" name="parent_id">
															<option value="">--Select--</option>
															<?php
															$query="SELECT *FROM categories WHERE parent_id IS NULL;";
															$categories = $conn->query($query);
															if ($categories->num_rows > 0)
															{
																while($list_category = $categories->fetch_object())
																{
																	$selected=$list_category->id==$category->parent_id ? 'selected' : '';

																	?>
																	<option <?php echo $selected;?> value="<?php echo $list_category->id;?>"><?php echo $list_category->name ?></option>
																	<?php
																}
															}
															?>
														</select>
													</div>

													<div class="mb-3">
														<label class="form-label">Upload Image</label>
														<input class="form-control" type="file" name="image">
														<?php
														if(isset($_SESSION['errors']['image']))
														{
															echo '<span class="text-danger">'.$_SESSION['errors']['image'].'</span>';
															unset($_SESSION['errors']['image']);
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


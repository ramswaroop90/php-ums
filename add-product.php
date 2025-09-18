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


						<div class="row">
							<div class="col-12">
								<div class="page-title-box">
									<h4 class="page-title">Add Product</h4>
								</div>
							</div>
						</div>



						<div class="row">
							<div class="col-lg-12">
								<div class="card">
									<div class="card-body">
										<form action="save-product.php" method="POST" enctype="multipart/form-data">
											<div class="row mb-3">
												<div class="col-lg-4">
													<label class="form-label">Product Name <span class="text-danger">*</span></label>
													<input type="text" name="name" class="form-control" placeholder="e.g : Apple iMac">
													<?php
													if(isset($_SESSION['errors']['name']))
													{
														echo '<span class="text-danger">'.$_SESSION['errors']['name'].'</span>';
														unset($_SESSION['errors']['name']);
													}
													?>
												</div>
												<div class="col-lg-4">
													<label class="form-label">Category <span class="text-danger">*</span></label>
													<select class="form-control" name="category_id">
														<option value="">--Select--</option>
														<?php
														$query="SELECT *FROM categories";
														$categories = $conn->query($query);
														if ($categories->num_rows > 0)
														{
															while($list_category = $categories->fetch_object())
															{
																?>
																<option value="<?php echo $list_category->id;?>"><?php echo $list_category->name ?></option>
																<?php
															}
														}
														?>
													</select>
													<?php
													if(isset($_SESSION['errors']['category_id']))
													{
														echo '<span class="text-danger">'.$_SESSION['errors']['category_id'].'</span>';
														unset($_SESSION['errors']['category_id']);
													}
													?>
												</div>
												<div class="col-lg-4">
													<label class="form-label">Brand <span class="text-danger">*</span></label>
													<select class="form-control" name="brand_id">
														<option value="">--Select--</option>
														<?php
														$query="SELECT *FROM brands";
														$brands = $conn->query($query);
														if ($brands->num_rows > 0)
														{
															while($brand = $brands->fetch_object())
															{
																?>
																<option value="<?php echo $brand->id;?>"><?php echo $brand->name ?></option>
																<?php
															}
														}
														?>
													</select>
													<?php
													if(isset($_SESSION['errors']['brand_id']))
													{
														echo '<span class="text-danger">'.$_SESSION['errors']['brand_id'].'</span>';
														unset($_SESSION['errors']['brand_id']);
													}
													?>
												</div>
											</div>
											<div class="row mb-3">
												<div class="col-lg-4">
													<label class="form-label">Price <span class="text-danger">*</span></label>
													<input type="number" name="unit_price" class="form-control">
													<?php
													if(isset($_SESSION['errors']['unit_price']))
													{
														echo '<span class="text-danger">'.$_SESSION['errors']['unit_price'].'</span>';
														unset($_SESSION['errors']['unit_price']);
													}
													?>
												</div>
												<div class="col-lg-4">
													<label class="form-label">Quantity <span class="text-danger">*</span></label>
													<select class="form-control" name="quantity">
														<option value="">--Select--</option>
														<?php
														for ($i=1; $i <=50 ; $i++)
														{
															echo "<option value='".$i."'>$i</option>";
														}
														?>

													</select>
													<?php
													if(isset($_SESSION['errors']['quantity']))
													{
														echo '<span class="text-danger">'.$_SESSION['errors']['quantity'].'</span>';
														unset($_SESSION['errors']['quantity']);
													}
													?>
												</div>
												<div class="col-lg-4">
													<label class="form-label">Discount <span class="text-danger">*</span></label>
													<input type="number" class="form-control" name="discount">
													<?php
													if(isset($_SESSION['errors']['discount']))
													{
														echo '<span class="text-danger">'.$_SESSION['errors']['discount'].'</span>';
														unset($_SESSION['errors']['discount']);
													}
													?>
												</div>
											</div>
											<div class="row mb-3">

												<div class="col-lg-4">
													<label class="form-label">Tax Rate <span class="text-danger">*</span></label>
													<input type="number" class="form-control" name="tax_rate">
													<?php
													if(isset($_SESSION['errors']['tax_rate']))
													{
														echo '<span class="text-danger">'.$_SESSION['errors']['tax_rate'].'</span>';
														unset($_SESSION['errors']['tax_rate']);
													}
													?>
												</div>
												<div class="col-lg-8">
													<label class="form-label">Status <span class="text-danger">*</span></label>
													<br/>
													<div class="radio form-check-inline">
														<input type="radio" id="inlineRadio1" value="instock" name="status" checked="">
														<label for="inlineRadio1"> Online </label>
													</div>
													<div class="radio form-check-inline">
														<input type="radio" id="inlineRadio2" value="outstock" name="status">
														<label for="inlineRadio2"> Offline </label>
													</div>
													<div class="radio form-check-inline">
														<input type="radio" id="inlineRadio3" value="draft" name="status">
														<label for="inlineRadio3"> Draft </label>
													</div>
													<?php
													if(isset($_SESSION['errors']['status']))
													{
														echo '<span class="text-danger">'.$_SESSION['errors']['status'].'</span>';
														unset($_SESSION['errors']['status']);
													}
													?>
												</div>
											</div>
											<div class="row mb-3">
												<div class="col-lg-12">
													<label class="form-label">Product Description <span class="text-danger">*</span></label>
													<textarea class="form-control" name="description"></textarea>
													<?php
													if(isset($_SESSION['errors']['description']))
													{
														echo '<span class="text-danger">'.$_SESSION['errors']['description'].'</span>';
														unset($_SESSION['errors']['description']);
													}
													?>
												</div>
												<div class="col-lg-12">
													<div class="text-end mt-3">
														<button type="submit" class="btn w-sm btn-success waves-effect waves-light" name="save-product" value="save-product">Save</button>
													</div>
												</div>
											</div>
										</form>
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


<?php
include_once('connection.php');
session_start();

if(isset($_SESSION['auth_user']))
{
	$authuser=(object)$_SESSION['auth_user'];
	$stmt = $conn->prepare("SELECT *from users where id=?");
	$stmt->bind_param("i", $authuser->id);
	$stmt->execute();

	$user_result = $stmt->get_result();
	$user=$user_result->fetch_object();

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
							<?php include 'layouts/flash-message.php'; ?>
							<div class="col-lg-4 col-xl-4">
								<div class="card text-center">
									<div class="card-body">
										<img src="assets/images/users/user-1.jpg" class="rounded-circle img-thumbnail profile-image" alt="profile-image">

										<h4 class="mb-0">Geneva McKnight</h4>
										<p class="text-muted">@webdesigner</p>

										<button type="button" class="btn btn-success btn-xs waves-effect mb-2 waves-light">Follow</button>
										<button type="button" class="btn btn-danger btn-xs waves-effect mb-2 waves-light">Message</button>

										<div class="text-start mt-3">
											<p class="text-muted mb-2 font-13"><strong>Full Name :</strong> <span class="ms-2">Geneva D. McKnight</span></p>

											<p class="text-muted mb-2 font-13"><strong>Mobile :</strong><span class="ms-2">(123) 123 1234</span></p>

											<p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ms-2">user@email.domain</span></p>

											<p class="text-muted mb-1 font-13"><strong>Location :</strong> <span class="ms-2">USA</span></p>
										</div>
									</div>
								</div>
							</div>

							<div class="col-lg-8 col-xl-8">
								<div class="card">
									<div class="card-body">

										<form action="update-profile.php" method="POST" enctype="multipart/form-data">
											<h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Personal Info</h5>
											<div class="row">
												<div class="col-md-6">
													<div class="mb-3">
														<label class="form-label">First Name</label>
														<input type="text" class="form-control" name="first_name" value="<?php echo $user->first_name?>">
														<?php
														if(isset($_SESSION['errors']['first_name']))
														{
															echo '<span class="text-danger">'.$_SESSION['errors']['first_name'].'</span>';
															unset($_SESSION['errors']['first_name']);

														}
														?>
													</div>
												</div>
												<div class="col-md-6">
													<div class="mb-3">
														<label class="form-label">Last Name</label>
														<input type="text" class="form-control" name="last_name" value="<?php echo $user->last_name?>">
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-md-6">
													<div class="mb-3">
														<label class="form-label">Email Address</label>
														<input type="email" class="form-control" value="<?php echo $user->email?>" disabled>
													</div>
												</div>
												<div class="col-md-6">
													<div class="mb-3">
														<label class="form-label">Mobile</label>
														<input type="text" class="form-control" name="mobile" value="<?php echo $user->mobile?>">
														<?php
														if(isset($_SESSION['errors']['mobile']))
														{
															echo '<span class="text-danger">'.$_SESSION['errors']['mobile'].'</span>';
															unset($_SESSION['errors']['mobile']);

														}
														?>
													</div>
												</div>

												<div class="col-md-6">
													<div class="mb-3">
														<label class="form-label">Date Of Birth</label>
														<input type="date"  id="example-date" class="form-control" name="date_of_birth" value="<?php echo $user->date_of_birth?>">
													</div>
													<?php
													if(isset($_SESSION['errors']['date_of_birth']))
													{
														echo '<span class="text-danger">'.$_SESSION['errors']['date_of_birth'].'</span>';
														unset($_SESSION['errors']['date_of_birth']);

													}
													?>
												</div>

												<div class="col-md-6">
													<div class="mb-3">
														<label class="form-label">Gender</label>
														<select class="form-control" name="gender">
															<option value="">--Select--</option>
															<option value="male" <?php echo $user->gender=='male' ? 'selected' : ''; ?>>Male</option>
															<option value="female" <?php echo $user->gender=='female' ? 'selected' : ''; ?>>Female</option>
															<option value="other" <?php echo $user->gender=='other' ? 'selected' : ''; ?>>Other</option>
														</select>
														<?php
														if(isset($_SESSION['errors']['gender']))
														{
															echo '<span class="text-danger">'.$_SESSION['errors']['gender'].'</span>';
															unset($_SESSION['errors']['gender']);
														}
														?>
													</div>
												</div>
												<div class="col-md-12">
													<div class="mb-1">
														<label class="form-label">Profile Image</label>
														<input type="file" class="form-control" name="profile_image">
													</div>
												</div>
											</div>
											<div class="text-end">
												<button type="submit" class="btn btn-success waves-effect waves-light my-3" name="update_profile" value="update_profile"><i class="mdi mdi-content-save"></i> Update</button>
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


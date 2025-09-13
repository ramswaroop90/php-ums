<?php
include_once('connection.php');
session_start();

if(isset($_SESSION['auth_user']) && isset($_POST['update_profile']))
{
	$authuser=(object)$_SESSION['auth_user'];
	$errors=array();
	$user_id=$authuser->id;
	$first_name=test_input($_POST['first_name']);
	$last_name=test_input($_POST['last_name']);
	$mobile=test_input($_POST['mobile']);
	$date_of_birth=test_input($_POST['date_of_birth']);
	$gender=test_input($_POST['gender']);



	if(empty($first_name))
	{
		$errors['first_name']='First Name is required.';
	}

	if(empty($mobile))
	{
		$errors['mobile']='Mobile field is required.';
	}

	if(empty($date_of_birth))
	{
		$errors['date_of_birth']='Date of birth field is required.';
	}

	if(empty($gender))
	{
		$errors['gender']='Gender field is required.';
	}

	$image_name=$_FILES["profile_image"]["name"];
	$image=NULL;
	if($image_name)
	{
		$extension = substr($image_name,strlen($image_name)-4,strlen($image_name));
		if(!in_array($extension,[".jpg",".png",".gif"]))
		{
			$errors['image']='Only .png, .gif, .jpg.';
		}
		else
		{
			$image='user_'.$user_id.$extension;
			move_uploaded_file($_FILES["profile_image"]["tmp_name"],"uploads/".$image);
		}
	}
	else
	{
		$image=
	}


	if(count($errors))
	{
		$_SESSION['errors']=$errors;
		header("Location: profile.php");
	}
	else
	{
		$stmt = $conn->prepare("UPDATE users SET first_name=?, last_name=?, mobile=?, date_of_birth=?, gender=?, profile_image=? where id=?");
		$stmt->bind_param("sssssis", $first_name, $last_name, $mobile, $date_of_birth,$gender,$user_id,);
		$result=$stmt->execute();

		if($result)
		{
			$_SESSION['success']="Profile updated successfully.";
		}
		else
		{
			$_SESSION['error']="Something went wrong.";
		}
		header('Location: profile.php');
	}
}
else
{
	header('Location: index.php');
}

function test_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>
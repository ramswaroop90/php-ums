<?php
include_once('connection.php');
session_start();
$name = $email = $password = $confirm_password = "";

if(isset($_POST['signup']))
{

	$errors=array();
	$name=test_input($_POST['name']);
	$email=test_input($_POST['email']);
	$password=test_input($_POST['password']);
	$confirm_password=test_input($_POST['confirm_password']);

	$query="SELECT *from users where email='".$email."';";
	$result=$conn->query($query);

	if($result->num_rows>0)
	{
		$errors['email']='Email already exists';
	}

	if($password!=$confirm_password)
	{
		$errors['password']='Password and confirm password does not matched';
	}

	if(count($errors))
	{
		$_SESSION['errors']=$errors;
	}
	else
	{
		//$query="INSERT into users(name,email,password) values('".$name."','".$email."','".$password."');";
		$stmt = $conn->prepare("INSERT INTO users(name,email,password) VALUES(?,?,?)");
		$stmt->bind_param("sss", $name, $email, $password);
		$result=$stmt->execute();
		$stmt->close();
		$conn->close();
		if($result)
		{
			$_SESSION['success']="User Registered successfully.";
		}
		else
		{
			$_SESSION['error']="Something went wrong.";
		}
	}

	header('Location: index.php');
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
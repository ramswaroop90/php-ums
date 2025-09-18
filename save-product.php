<?php
include_once('connection.php');
session_start();

if(isset($_POST['save-product']))
{
	$errors=array();
	$name=test_input($_POST['name']);
	$category_id=test_input($_POST['category_id']);
	$brand_id=test_input($_POST['brand_id']);
	$unit_price=test_input($_POST['unit_price']);
	$quantity=test_input($_POST['quantity']);
	$discount=test_input($_POST['discount']);
	$tax_rate=test_input($_POST['tax_rate']);
	$status=test_input($_POST['status']);
	$description=test_input($_POST['description']);

	foreach ($_POST as $key => $value)
	{
		if(empty($value))
		{
			$errors[$key]=$key.' is required.';
		}
	}

	if(count($errors))
	{
		$_SESSION['errors']=$errors;
		header('Location: add-product.php');
	}
	else
	{
		die();
		date_default_timezone_set("UTC");
		$date=date("Y-m-d H:i:s");

		$stmt = $conn->prepare("INSERT INTO products(first_name,last_name,email,password,type,created_at,updated_at) VALUES(?,?,?,?,?,?,?)");
		$stmt->bind_param("sssssss", $first_name, $last_name, $email, $password,$type,$date,$date);
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
		header('Location: users-list.php');
	}
}
else
{
	header('Location: admin-dashboard.php');
}

function test_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

?>
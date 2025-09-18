<?php
session_start();
include_once('connection.php');

if(isset($_SESSION['auth_user']))
{

	$category_id=$_GET['id'];

	$stmt = $conn->prepare("SELECT *from categories where id=?");
	$stmt->bind_param("i", $category_id);
	$stmt->execute();
	$result = $stmt->get_result();
	$category = $result->fetch_object();

	if($result->num_rows)
	{
		$stmt = $conn->prepare("DELETE from categories where id=?");
		$stmt->bind_param("i", $category_id);
		$result=$stmt->execute();
		$stmt->close();
		$conn->close();
		if($result)
		{
			$directory="uploads/categories";
			if ($category->image && file_exists($directory.'/'.$category->image))
			{
				unlink($directory.'/'.$category->image);
			}
			$_SESSION['success']="Category deleted successfully..";
		}
		else
		{
			$_SESSION['error']="Something went wrong.";
		}
		header('Location: categories-list.php');

	}
	else
	{
		$_SESSION['error']="Something went wrong.";
		header('Location: categories-list.php');
	}
}
else
{
	$_SESSION['error']="Something went wrong.";
	header('Location: index.php');
}



?>
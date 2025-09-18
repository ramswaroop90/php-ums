<?php

if(isset($_POST['save-category']))
{
	include_once('connection.php');
	session_start();
	$name = $status = $image="";
	$errors=array();
	$name=test_input($_POST['name']);
	$status=test_input($_POST['status']);
	$parent_id=test_input($_POST['parent_id']);

	$image_name=$_FILES["image"]["name"];
	$image=NULL;
	if($image_name && !$parent_id)
	{
		$extension = substr($image_name,strlen($image_name)-4,strlen($image_name));
		if(!in_array($extension,[".jpg","jpeg",".png",".gif"]))
		{
			$errors['image']='Only .jpeg, .png, .gif, .jpg.';
		}
		else
		{
			$directory="uploads/categories";
			if (!file_exists($directory))
			{
				mkdir($directory);
			}
			$stmt = $conn->prepare("SELECT *FROM categories ORDER BY id DESC LIMIT 1;");
			$stmt->execute();
			$result = $stmt->get_result();
			$stmt->close();
			$category=$result->fetch_object();
			$image='category_'.($category->id+1).$extension;
			move_uploaded_file($_FILES["image"]["tmp_name"],$directory."/".$image);
		}
	}



	if(is_null($name))
	{
		$errors['name']='Name is required.';
	}

	$name_alias = str_replace(' ', '', $name);
	$name_alias = preg_replace('/[^A-Za-z0-9]/', '', $name_alias);
	$name_alias=strtoupper($name_alias);

	$query="SELECT *from categories where name_alias='".$name_alias."';";
	$result=$conn->query($query);


	if($result->num_rows>0)
	{
		$errors['name']='Name already exists';
	}

	if(is_null($status))
	{
		$errors['status']='Status is required.';
	}


	if(count($errors))
	{
		$_SESSION['errors']=$errors;
		header('Location: add-category.php');
	}
	else
	{
		date_default_timezone_set("UTC");
		$date=date("Y-m-d H:i:s");


		$stmt = $conn->prepare("INSERT INTO categories(name,name_alias,status,parent_id,image,created_at,updated_at) VALUES(?,?,?,?,?,?,?)");
		$stmt->bind_param("ssissss", $name,$name_alias,$status,$parent_id,$image,$date,$date);
		$result=$stmt->execute();
		$stmt->close();
		$conn->close();
		if($result)
		{
			$_SESSION['success']="Category added successfully.";
		}
		else
		{
			$_SESSION['error']="Something went wrong.";
		}
		header('Location: categories-list.php');
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
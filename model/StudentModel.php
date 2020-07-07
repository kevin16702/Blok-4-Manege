<?php

function val($data)
{
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	
	return $data;
}

function getAllStudents() 
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM student";
	$query = $db->prepare($sql);
	$query->execute();

	$db = null;

	return $query->fetchAll();
}

function GetAllReservations()
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM reservation";
	$query = $db->prepare($sql);
	$query->execute();

	$db = null;

	return $query->fetchAll();
}

function getAllhorses() 
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM horses";
	$query = $db->prepare($sql);
	$query->execute();

	$db = null;

	return $query->fetchAll();
}

function RegisterHorse($name, $height, $race, $age)
{
	if(empty($_POST['name']) || empty($_POST['height']) || empty($_POST['race']) || empty($_POST['age']))
	{
		$error = "niet alles is ingevult";
		return $error;
	}
	else
	{
	$db = openDatabaseConnection();
	$sql = "INSERT INTO horses (name, height, race, age) VALUES (?, ?, ?, ?)";
	$query = $db->prepare($sql);
	$query->execute([$name, $height, $race, $age]);

	$db = null;
	$error = "";
	return $error;
	}
}

function HorseDelete($id)
{
	$db = openDatabaseConnection();
	$sql = "DELETE FROM horses WHERE id = ?";
	$query = $db->prepare($sql);
	$query->execute([$id]);

	$db = null; 
}

function DeleteStudent($id)
{
	$db = openDatabaseConnection();
	$sql = "DELETE FROM student WHERE student_id = ?";
	$query = $db->prepare($sql);
	$query->execute([$id]);

	$db = null; 
	header("Refresh:0");
}

function HorseEdit($name, $height, $race, $age, $id)
{
	$db = openDatabaseConnection();
	$sql = "UPDATE horses SET name = ?, height = ?, race = ?, age = ? WHERE id = ?";
	$query = $db->prepare($sql);
	$query->execute([$name, $height, $race, $age, $id]);

	$db = null;
}

function EditStudent($name, $phonenumber, $id)
{
	$db = openDatabaseConnection();
	$sql = "UPDATE student SET student_name = ?, phone_number = ? WHERE student_id = ?";
	$query = $db->prepare($sql);
	$query->execute([$name, $phonenumber, $id]);

	$db = null;
	header("Refresh:0");
}
function RegisterStudent($name, $phonenumber)
{
	$db = openDatabaseConnection();
	$sql = "INSERT INTO student (student_name, phone_number) VALUES (?, ?)";
	$query = $db->prepare($sql);
	$query->execute([$name, $phonenumber]);

	$db = null;
	header("Refresh:0");
}

function MakeReservation($name, $time, $length, $horse) 
{
	$db = openDatabaseConnection();
	$price = $length * 55;
	$sql = "INSERT INTO reservation (Name, Time, Length, Price, Horse) VALUES (?,?,?,?,?)";
	$query = $db->prepare($sql);
	$query->execute([$name, $time, $length, $price, $horse]);

	$db = null;
	header("Refresh:0");
}


function ChangeReservation($name, $time, $length, $horse, $id) 
{
	$db = openDatabaseConnection();
	$price = 55 * $length;
	$sql = "UPDATE reservation SET name = ?, Time = ?, Length = ?, Price= ?, Horse = ? WHERE id = ?";
	$query = $db->prepare($sql);
	$query->execute([$name, $time, $length, $price, $horse, $id]);

	$db = null;
	header("Refresh:0");
}

function DeleteReservation($id) 
{
	$db = openDatabaseConnection();
	$sql = "DELETE FROM reservation WHERE id = ?";
	$query = $db->prepare($sql);
	$query->execute([$id]);

	$db = null; 
	header("Refresh:0");
}
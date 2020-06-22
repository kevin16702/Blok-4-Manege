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

function CreateHorse($name, $height)
{
	$db = openDatabaseConnection();
	$sql = "INSERT INTO horses (name, height) VALUES (?, ?)";
	$query = $db->prepare($sql);
	$query->execute([$name, $height]);

	$db = null;
	header("Refresh:0");
}

function DeleteHorse($id)
{
	$db = openDatabaseConnection();
	$sql = "DELETE FROM horses WHERE id = ?";
	$query = $db->prepare($sql);
	$query->execute([$id]);

	$db = null; 
	header("Refresh:0");
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

function EditHorse($name, $height, $id)
{
	$db = openDatabaseConnection();
	$sql = "UPDATE horses SET name = ?, height = ? WHERE id = ?";
	$query = $db->prepare($sql);
	$query->execute([$name, $height, $id]);

	$db = null;
	header("Refresh:0");
}

function EditStudent($name, $id)
{
	$db = openDatabaseConnection();
	$sql = "UPDATE student SET student_name = ? WHERE student_id = ?";
	$query = $db->prepare($sql);
	$query->execute([$name, $id]);

	$db = null;
	header("Refresh:0");
}
function RegisterStudent($name)
{
	$db = openDatabaseConnection();
	$sql = "INSERT INTO student (student_name) VALUES (?)";
	$query = $db->prepare($sql);
	$query->execute([$name]);

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


function ChangeReservation($name, $time, $length, $price, $horse, $id) 
{
	$db = openDatabaseConnection();
	$sql = "UPDATE reservation SET Time = ?, Length = ?, Price = ?, Horse = ? WHERE id = ?";
	$query = $db->prepare($sql);
	$query->execute([$time, $length, $price, $horse, $id]);

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
<?php

require(ROOT . "model/StudentModel.php");

function index()
{
	render("student/index", array(
		'students' => getAllStudents()
	));
}

function reserve()
{
	$value = [getAllStudents(), getAllhorses()];
	render("student/reserve", $value);
}

function registeruser()
{
	render("student/registeruser");
}

function OverviewStudents()
{
	$value = getAllStudents();
	render("student/OverviewStudents", $value);
}
function overview()
{
	$value = [getAllReservations(), getAllStudents(), getAllhorses()];
	render("student/Overview", $value);
}

function HorsePage()
{	
	$value = getAllHorses();
	render("student/HorsePage", $value);
}

function UserPage()
{
	$value = getAllStudents();
	render("student/UserPage", $value);
}
function deletehorse()
{
	HorseDelete($_POST['delete']);
	HorsePage();
}

function createhorse()
{
	RegisterHorse(val($_POST['name']), $_POST['height'], val($_POST['race']), $_POST['age']);
	HorsePage();
}
function changehorse()
{
	HorseEdit(val($_POST['changedname']), $_POST['changedheight'] ,val($_POST['changedrace']), $_POST['changedage'], $_POST['change']);
	HorsePage();
}
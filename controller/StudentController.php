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
<?php

$error = "";
if(isset($_POST["submit"]))
{
    if(empty($_POST['name']) || empty($_POST['phonenumber'])){
        $error = "niet alles is ingevult";
    }
    else{
        RegisterStudent(val($_POST['name']), $_POST['phonenumber']);
        
    }
}
?>
<h1> Student Registreren </h1> 

<form action='' method="post"> 
    <h2> naam: <h2> 
    <input type="text" name="name">
    <h2> Telefoon nummer: </h2>
    <input type="number" name="phonenumber" min="0" max="999999999999999">
    <input type="submit" name="submit" value="submit">
</form>
<?php

$error = "";
if(isset($_POST["submit"]))
{
    if(empty($_POST['name'])){
        $error = "niet alles is ingevult";
    }
    else{
        RegisterStudent(val($_POST['name']));
        
    }
}
?>
<h1> Student Registreren </h1> 

<form action='' method="post"> 
    <h2> naam <h2> 
    <input type="text" name="name">
    <input type="submit" name="submit" value="submit">
</form>
<?php

$error = "";
if(isset($_POST['submit'])){
    if(empty($_POST['name']) || empty($_POST['time']) || empty($_POST['length']) || empty($_POST['horse']))
    {
        $error = "niet alles is ingevult";
    }

    else
    {
    MakeReservation(val($_POST['name']), $_POST['time'], $_POST['length'], val($_POST['horse']), $_GET['id']);
    }
}

?>

<h1> Reserveren </h1> 

<form action='' method="post" class="d-inline-block w-100"> 
    <h2> naam: </h2> 
    <select name="name"  class="col-2 float-left border rounded"> 
        <?php foreach($data[0] as $key => $row){ ?>
        <option> <?= $row['student_name']; ?> </option>
        <?php } ?>
    </select> <h3 class="text-danger">*</h3>
    <h2> tijd: </h2> 
    <input type="time" name="time"  class="col-1 float-left border rounded"> <h3 class="text-danger">*</h3>
    <h2> lengte van reservering: </h2> 
    <input type="number" name="length" min="1" max="6" step="1" class="col-1 float-left border rounded"> <div class="row"> <p class="col-1"> uur </p> <h3 class="col-1 p-0 m-0 text-danger"> *</h3> </div>
    <h2> paard/pony: </h2> 
    <select name="horse"  class="col-2 float-left border rounded"> 
        <?php foreach($data[1] as $key => $row){ ?>
        <option value=<?= $row['name'];?>> <?php  if( $row['height'] < 147.5)
        {
            echo "pony: ";
        }
        else
        {
            echo "paard: ";
        }
        echo $row['name'];
        ?> 
        </option>
        <?php } ?>
    </select> <h3 class="text-danger">*</h3>
    </br>
    <input type="submit" name="submit" value="submit" class="btn-success btn col-3 float-left m-1"> <h3 class="text-danger">* <?= $error; ?> </h3>
</form>
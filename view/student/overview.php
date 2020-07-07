<?php

if(isset($_POST['change'])){
    ChangeReservation(val($_POST['name']), $_POST['time'],$_POST['length'], $_POST['horse'], $_POST['change']);
}

if(isset($_POST['delete']))
{
    DeleteReservation($_POST['delete']);
}

?>
<h1> Reservaties </h1>
<?php $o = 0;
foreach($data[0] as $key => $row){
$id = $row['id'];
?>
<div class="col-8">
<h3> reservatie van: <?= $row['name']; ?> </h3>
Tijd:
<?= $row['Time']; ?></br>
Lengte
<?= $row['Length']; ?> uur</br>
Prijs: €
<?= $row['Price']; ?>,-</br>
Paard/pony
<?= $row['Horse']; ?></br>
</div>
<div class="btn dropdown show">
<button class="dropdown-toggle btn btn-danger" style="font-size: 1em;" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="<?= URL ?>student/index">Verwijder</button>
    <div class="dropdown-menu text-center" aria-labelledby="dropdownMenuLink">
        weet u het zeker?
        <form method='post' action=''>
        <button class="btn col-10 btn-danger my-2" name="delete" type="submit" value=<?= $row['id'];?>>Ja</button></form>
        <button class="col-10 btn-secondary btn"> Nee </button>
    </div>
</div>

<div class="btn dropdown show">
<button class="dropdown-toggle btn btn-warning" style="font-size: 1em;" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="<?= URL ?>student/index">Bewerken</button>
    <div class="dropdown-menu text-left" style="width:500px" aria-labelledby="dropdownMenuLink">          
        Bewerken
        <form action='' method="post" class="d-inline-block w-100"> 
    <h2> naam: </h2> 
    <select name="name"  class="col-5 float-left border rounded"> 
        <option selected hidden value="<?= $row['name'];?>">
        <?= $row["name"];?>
        </option>
        <?php foreach($data[1] as $key => $row2){ ?>
        <option> <?= $row2['student_name']; ?> </option>
        <?php } ?>
    </select> <h3 class="text-danger">*</h3>
    <h2> tijd: </h2> 
    <input type="time" name="time"  class="col-3 float-left border rounded" value="<?= $row['Time']; ?>"> <h3 class="text-danger">*</h3>
    <h2> lengte van reservering: </h2> 
    <input type="number" name="length" min="1" max="6" step="1" class="col-3 float-left border rounded" value="<?= $row['Length']; ?>"> <div class="row"> <p class="col-1"> uur </p> <h3 class="col-1 p-0 m-0 text-danger"> *</h3> </div>
    <h2> paard/pony: </h2> 
    <select name="horse"  class="col-5 float-left border rounded"> 
        <option selected hidden value="<?= $row['Horse'];?>">
        <?= $row['Horse']; ?>
        </option>
        <?php foreach($data[2] as $key => $row){ ?>
        <option value=<?= $row['name'];?>> <?php  if( $row['height'] < 147.5)
        {
            echo "pony: ";
        }
        else
        {
            echo "paard: ";
        }
        echo $row['name'];
        ?> </option>
        <?php } ?>
    </select> <h3 class="text-danger">*</h3>
    </br>
    <button class='btn btn-success my-2' type="submit" name="change" value=<?= $id; ?> class="btn-success btn col-3 float-left m-1"> submit </button> <h3 class="text-danger">* <?= $error; ?> </h3>
</form>
    </div>
    </div>
<?php $i++; 
$o++;
} ?>
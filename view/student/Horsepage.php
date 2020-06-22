<?php

$error = "";
if(isset($_POST['submit']))
{
    if(empty($_POST['name']) || empty($_POST['height']))
    {
        $error = "niet alles is ingevult";
    }
    else
    {
        CreateHorse(val($_POST['name']), $_POST['height']);
    }
}
if(isset($_POST['delete']))
{
    DeleteHorse($_POST['delete']);
}
if(isset($_POST['change']))
{
    EditHorse(val($_POST['changedname']), val($_POST['changedheight']) , $_POST['change']);
}
?>
<h1> Toevoegen van Paarden en Ponies </h1>
<form action='' method="post" class="d-inline-block w-100"> 
    <h2> naam: </h2> 
    <input type="text" name="name"  class="col-1 float-left border rounded"> <h3 class="text-danger">*</h3>
    <h2> hoogte: </h2> 
    <input type="number" name="height" min="70" max="200" step="1" class="col-1 float-left border rounded">  
    <div class="row"> <p class="col-1"> cm </p> <h3 class="col-1 p-0 m-0 text-danger"> *</h3> </div>
    </br>
    <input type="submit" name="submit" value="submit" class="btn-success btn col-3 float-left m-1"> <h3 class="text-danger">* <?= $error; ?> </h3>
</form>
</div> 
<div class="row border-rounded border mx-auto col-8">
<h1 class=col-12> Paarden: </h1>
<?php foreach($data as $key => $row){ ?>
    <div class=" mx-5 my-2 border-rounded border col-3">
    <h2> <?= $row['name']; ?> </h2>
        Hoogte: <?= $row['height']; ?> cm</br>
        Soort: <?php if($row['height'] < 147.5)
        {
            echo "pony";
        }
        else
        {
            echo "paard";
        } ?>
        </br>
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
				        <div class="dropdown-menu text-left" style="width:300px" aria-labelledby="dropdownMenuLink">          
                            Bewerken
                            <form method='post' action=''>  
                            <h2> naam: </h2> 
                             <input type="text" name="changedname"  class="col-5 border rounded">
                             </br>
                             <h2 class="mr-auto"> hoogte: </h2> 
                            <input type="number" name="changedheight" min="70" max="200" step="1" class="col-5 float-left border rounded">  
                            <div class="row"> <p class="col-1"> cm </p>
                            </div>
                            <button type="submit" value="<?= $row['id']; ?>" name="change" class='btn btn-success'> Submit </button>
                            </form>
                        </div>
                </div>
    </div> <?php } ?>
</div>
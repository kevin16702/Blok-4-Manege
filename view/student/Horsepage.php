<?php $error = RegisterHorse($name, $height, $race, $age);?>
<h1> Toevoegen van Paarden en Ponies </h1>
<form action='createhorse' method="post" class="d-inline-block w-100"> 
    <h2> naam: </h2> 
    <input type="text" name="name"  class="col-1 border rounded float-left"> <h3 class="text-danger">*</h3>
    <h2> hoogte: </h2> 
    <input type="number" name="height" min="70" max="200" step="1" class="col-1 border rounded float-left"> <div class="row"> <p class=" p-0 m-0"> cm </p> <h3 class=" p-0 m-0 text-danger"> *</h3> </div>
    <h2> ras: </h2> 
    <input type="text" name="race"  class="col-1 border rounded float-left"> <h3 class="text-danger">*</h3>
    <h2> Leeftijd </h2> 
    <input type="number" name="age" min="1" max="30" step="1" class="col-1 border rounded float-left"> <h3 class="text-danger">*</h3>
    </br>
    <input type="submit" name="submit" value="submit" class="btn-success btn col-3 m-1 float-left"> <h3 class="text-danger">* <?= $error; ?> </h3>
</form>
</div> 
<div class="row border-rounded border mx-auto col-8">
<h1 class=col-12> Paarden: </h1>
<?php foreach($data as $key => $row){ ?>
    <div class=" mx-5 my-2 border-rounded border col-3">
    <h2> <?= $row['name']; ?> </h2>
        Hoogte: <?= $row['height']; ?> cm</br>
        Ras: <?= $row['race']; ?> </br>
        Leeftijd: <?= $row['age']; ?> </br>
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
                            <form method='post' action='deletehorse'>
                            <button class="btn col-10 btn-danger my-2" name="delete" type="submit" value=<?= $row['id'];?>>Ja</button></form>
                            <button class="col-10 btn-secondary btn"> Nee </button>
                        </div>
                </div>

                <div class="btn dropdown show">
			        <button class="dropdown-toggle btn btn-warning" style="font-size: 1em;" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="<?= URL ?>student/index">Bewerken</button>
				        <div class="dropdown-menu text-left" style="width:300px" aria-labelledby="dropdownMenuLink">          
                            Bewerken
                            <form method='post' action='changehorse'>  
                            <h2> naam: </h2> 
                             <input type="text" name="changedname"  class="col-5 border rounded" value="<?= $row['name'];?>">
                             </br>
                             <h2 class="mr-auto"> hoogte: </h2> 
                            <input type="number" name="changedheight" min="70" max="200" step="1" class="col-5 border rounded" value="<?= $row['height'];?>">cm
                            </br>
                            <h2> ras: </h2> 
                            <input type="text" name="changedrace"  class="col-4 border rounded" value="<?= $row['race'];?>">
                            <h2> Leeftijd </h2> 
                            <input type="number" name="changedage" min="1" max="30" step="1" class="col-5 border rounded" value="<?= $row['age'];?>">
                            </br> 
                            <button type="submit" value="<?= $row['id']; ?>" name="change" class='btn btn-success'> Submit </button>
                            </form>
                        </div>
                </div>      
          </div> <?php } ?>
</div>
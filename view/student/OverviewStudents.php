<?php
if(isset($_POST['delete']))
{
    DeleteStudent($_POST['delete']);
}
if(isset($_POST['change']))
{
    EditStudent(val($_POST['changedname']) , $_POST['change']);
}
?>
</div> 
<?php foreach($data as $key => $row){ ?>
<div class="row border-rounded border mx-auto col-8">
                <h1 class="col-12"> <?= $row['student_id']; ?> </h1>
                <h2 class="col-12"> <?= $row['student_name']; ?></h2>
        		<div class="btn dropdown show">
			        <button class="dropdown-toggle btn btn-danger" style="font-size: 1em;" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="<?= URL ?>student/index">Verwijder</button>
				        <div class="dropdown-menu text-center" aria-labelledby="dropdownMenuLink">
                            weet u het zeker?
                            <form method='post' action=''>
                            <button class="btn col-10 btn-danger my-2" name="delete" type="submit" value=<?= $row['student_id'];?>>Ja</button>
                            </form>
                            <button class="col-10 btn-secondary btn"> Nee </button>
                        </div>
                </div>

                <div class="btn dropdown show">
			        <button class="dropdown-toggle btn btn-warning" style="font-size: 1em;" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="<?= URL ?>student/index">Bewerken</button>
				        <div class="dropdown-menu text-left" style="width:300px" aria-labelledby="dropdownMenuLink">          
                            Bewerken
                            <form method='post' action=''>  
                            <h2> naam: </h2> 
                             <input type="text" name="changedname"  class="col-10 border rounded">
                             </br>
                            <button type="submit" value="<?= $row['student_id']; ?>" name="change" class='btn btn-success my-2'> Submit </button>
                            </form>
                        </div>
                </div>
    </div> <?php } ?>
</div>
<?php
require_once "database.php";
require_once "html_components.php"
?>


<?php
print PrintHead("Leuke plekken in Europa");
print PrintBody();
print PrintJumbo("Leuke plekken in Europa","Lijst met de beste bestemmingen");
?>



<div class="container">
    <div class="row">
        <?php
        //verbind met de BD steden
        $steden = GetData("select * from images");
        // alle steden overlopen en hun info uitprinten
        if ($steden)
        {
            // output data of each row
            while($row = $steden->fetch_assoc())
            {
                print "<div class='col-sm-4'>
            <h3>".$row["img_title"]."</h3>
            <p>".$row["img_width"]." x ".$row["img_height"]." pixels</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
            <img src='./img/".$row["img_filename"]."' alt='".$row["img_title"]."' class='img-fluid'>
            <a href='./stad.php?img_id=".$row["img_id"]."'>Meer info</a>
            </div>";
            }
        }
        else
        {
            echo "No records found";
        }


        ?>
    </div>
</div>

<?php
print PrintClose();
?>


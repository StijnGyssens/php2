<?php
require_once "database.php";
require_once "html_components.php"
?>

<?php
print PrintHead("Detail stad");
print PrintBody();
print PrintJumbo("Detail stad");
?>

<div class="container">
    <div class="row">
        <?php
        //verbind met de BD steden
        $stad = GetData("
select * from images
where img_id like ".$_GET["img_id"]."
");
        // alle steden overlopen en hun info uitprinten
        if ($stad)
        {
            // output data of each row
            while($row = $stad->fetch_assoc())
            {
                print "<div class='container'>
            <h3>".$row["img_title"]."</h3>
            <p>Filename:".$row["img_filename"]."</p>
            <p>".$row["img_width"]." x ".$row["img_height"]." pixels</p>
            <img src='./img/".$row["img_filename"]."' alt='".$row["img_title"]."' class='img-fluid'>
            <a href='./steden2.php'>Terug naar overzicht</a>
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
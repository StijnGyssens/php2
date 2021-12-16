<?php
require_once "database.php";
require_once "html_components.php";
require_once "functions.php"
?>

<?php
print PrintHead("Bewerk afbeelding");
print PrintBody();
print PrintJumbo("Bewerk afbeelding");
?>

<div class="container">
    <div class="row">

        <?php
        //verbind met de BD steden
        $stad = GetData("
select * from images
where img_id =".$_GET["img_id"]."
");
        // alle steden overlopen en hun info uitprinten
        if ($stad)
        {
            // output data of each row
            while($row = $stad->fetch_assoc())
            {
                print "<form action='save.php' method='post'>
            <div class='form-group row'>
                <label for='img_id' class='col-sm-4 col-form-label'>Id</label>
                    <div class='col-sm-8'>
                        <input readonly type='number' class='form-control-plaintext' id='img_id' name='img_id' value='{$row['img_id']}'>
                    </div>
                </div>
                <div class='img_title form-group row'>
                    <label for='img_title' class='col-sm-4 col-form-label'>Title</label>
                    <div class='col-sm-8'>
                        <input type='text' class='form-control' id='img_title' name='img_title' value='{$row['img_title']}'>
                    </div>
                </div>
                <div class='img_filename form-group row'>
                    <label for='img_filename' class='col-sm-4 col-form-label'>Filename</label>
                    <div class='col-sm-8'>
                        <input type='text' class='form-control' id='img_filename' name='img_filename' value='{$row['img_filename']}'>
                    </div>
                </div>
                <div class='img_width form-group row'>
                    <label for='img_width' class='col-sm-4 col-form-label'>Width</label>
                    <div class='col-sm-8'>
                        <input type='number' class='form-control' id='img_width' name='img_width' value='{$row['img_width']}'>
                    </div>
                </div>
                <div class='img_height form-group row'>
                    <label for='img_height' class='col-sm-4 col-form-label'>Height</label>
                    <div class='col-sm-8'>
                        <input type='number' class='form-control' id='img_height' name='img_height' value='{$row['img_height']}'>
                    </div>
                </div>
                <button type='submit' class='btn btn-primary' id='btnSave' name='btnSave'>Save</button>
                </form>
                <img src=./img/{$row["img_filename"]} alt={$row["img_title"]} class='img-fluid col-sm-10'>"
            ;
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
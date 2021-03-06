<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

require_once "lib/pdo.php";
require_once "lib/html_functions.php";

PrintHead();
PrintJumbo( $title = "Bewerk afbeelding", $subtitle = "" );
?>

<div class="container">
    <div class="row">

        <?php
            if ( ! is_numeric( $_GET['img_id']) ) die("Ongeldig argument " . $_GET['img_id'] . " opgegeven");

            //get data (model)
            $data = GetData( "select * from images where img_id =" . $_GET['img_id'] );

            //get template (view)
            $template = file_get_contents("templates/stad_form.html");

            $template =str_replace("@options@",
                MakeSelect($fieldname = "img_lan_id",
                    $sql = "select * from land",
                    $list_fields=["lan_id","lan_land"],
                    $id = $data[0]["img_lan_id"]
                )
                ,$template);

            //merge (controller)
            $output = MergeViewWithData( $template, $data );
            print $output;
        ?>

    </div>
</div>

</body>
</html>
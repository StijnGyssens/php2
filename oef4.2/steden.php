<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

require_once "lib/autoload.php";

PrintHead();
PrintJumbo( $title = "Leuke plekken in Europa" ,
                        $subtitle = "Tips voor citytrips voor vrolijke vakantiegangers!" );
PrintNavbar();
?>



        <?php
        if ($_SESSION['msgs']){
            print '
                <div class="container">
                    <div class="row">
                        <div class="alert alert-success">Bedankt voor uw registratie</div>
                    </div>
                </div>
                ';
        }
        unset($_SESSION['msgs']);
        ?>


</body>
</html>

<div class="container">
    <div class="row">

<?php
    //get data
    $data = GetData( "select * from images" );

    //get template
    $template = file_get_contents("templates/column.html");

    //merge
    $output = MergeViewWithData( $template, $data );
    print $output;
?>

    </div>
</div>

</body>
</html>
<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

require_once "lib/autoload.php";

PrintHead();
PrintJumbo( $title = "Weekoverzicht"  );
PrintNavbar();
?>



</body>
</html>

<div class="container">
    <div class="row">

<?php
    //get data
    $data = GetData( "select * from taak" );
    $d = new DateTime();
    if (!key_exists("date",$_GET)){
        $_GET["date"]="";
    }
    if($_GET["date"]==="vorige"){
        $d->modify("-1 week");
    }else if($_GET["date"]==="volgende"){
        $d->modify("+1 week");
    }
    $day=$d->modify('monday this week');

    $todo=[];
    foreach ($data as $row){
        $todo[]=$row["taa_datum"];
    }


    $html="<table class='table table-bordered'>";
    for($x=0;$x<7;$x++){
        $dayString=$day->format('Y-m-d');
        $html.= "<tr><td>{$day->format("l")}</td><td>{$dayString}</td>";
        if(array_search($dayString,$todo)){
            $taak=GetData('select * from taak where taa_datum like "'.$dayString.'"');
            $html.="<td>{$taak[0]['taa_start']}-{$taak[0]['taa_end']} {$taak[0]['taa_omschr']}</td>";
        }
        $html.="</tr>";
        $day=$day->modify("+1 day");
    }
    $html.="</table>";
print $html;
?>

    </div>
</div>
<a class="btn btn-primary" href="/programeren/date/week.php?date=vorige" role="button">vorige week</a><a class="btn btn-primary" href="/programeren/date/week.php" role="button">deze week</a><a class="btn btn-primary" href="/programeren/date/week.php?date=volgende" role="button">volgende week</a>

</body>
</html>
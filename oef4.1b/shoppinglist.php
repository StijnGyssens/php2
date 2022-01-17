<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

require_once "lib/autoload.php";
require_once "models/ShoppinList.php";

PrintHead();
PrintJumbo("We gaan shoppen!");
?>

<div class="container">
    <div class="column">

        <?php
        $vandaag= new DateTime();

        # $sl is een objectvariable, maar ook een instance van de class ShoppingList
        $sl = new ShoppinList("aldi");
        //$sl ->shop="zeeman";
        //$sl->date=$vandaag;
        //$sl->items=["onderbroeken","sokken","muts"];
        //$sl->setShop("Zeeman");
        //$sl->setDate(new DateTime());
        $sl->setItems(["onderbroeken","sokken","muts"]);


        //print("<pre>".print_r($sl,true)."</pre>");
        //print "<br>";
        //var_dump($vandaag);
        print "<p>Waar? {$sl->getShop()}</p>";
        print "<p>Wanneer? {$sl->getDate()} </p>";

        $all=$sl->getShoppingList();
        var_dump($all)

        ?>

    </div>
</div>

</body>
</html>
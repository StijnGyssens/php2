<?php


function GetData($statement){
    $servername = "localhost";
    $username = "root";
    $password = "rootpaswoord";
    $dbname = "steden";

// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

//define and execute query
    $sql = $statement;
    $result = $conn->query($sql);
    $conn->close();
    return $result;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Mijn eerste webpagina</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/style.css">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<body>

<div class="jumbotron text-center">
    <h1>Leuke plekken in Europa</h1>
    <p>Resize this responsive page to see the effect!</p>
</div>

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

</body>
</html>
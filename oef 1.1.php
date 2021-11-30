<?php
$student = array(
        "voornaam"=> "Jan",
        "naam"=> "Janssens",
        "straat"=> "Oude baan",
        "huisnr"=> "22",
        "postcode"=> 2800,
        "gemeente"=> "Mechelen",
        "geboortedatum"=> "14/05/1991",
        "telefoon"=> "015 24 24 26",
        "e-mail"=> "jan.janssens@gmail.com"
);


function StudentToTable($student){
    print "<h1>Student</h1>";
    print "<table>";
    foreach ($student as $key => $value) {
        print "<tr><td>" . ucfirst($key) . "</td><td>" . $value . "</td></tr>\n";
    }
    print "</table>\n";
}

StudentToTable($student);
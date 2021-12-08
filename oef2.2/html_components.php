<?php
function PrintHead($title){
    $head = file_get_contents("./templates/head.html");
    return str_replace("@@titel@@",$title,$head);
}
function PrintJumbo($title,$subtitle =""){
    $jumbo = file_get_contents("./templates/jumbo.html");
    $replace=[$title,$subtitle];
    $find=["@@titel@@","@@subtitel@@"];
    return str_replace($find,$replace,$jumbo);
}
function PrintBody(){
    return "<body>";
}
function PrintClose(){
    return"</body></html>";
}
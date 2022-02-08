<?php
if($public_access!=true) {
    if (!key_exists('user', $_SESSION)) {
        header("Location: no_acces.php");
    }
}
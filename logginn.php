<?php
session_start();
If (!$_SESSION["loggetInn"]){
    echo "Du er ikke logget på ! Trykk her for å logge på :";
    echo "<a href='loginn.php'>Tilbake</a>";
    die();
}
?>


<?php
session_start();
require_once 'db.php';
include 'test_logginn.php';
?>
<html>
    <head>
        <title>Skirennregister</title> 
    </head>
    <body>
        <h3>Vennligst velg:</h3>
        <button onClick="window.location.href='ovelse.php'">Øvelse</button>
        <button onClick="window.location.href='utover.php'">Utøver</button>
        <button onClick="window.location.href='admin_reg.php'">Brukeradministrasjon</button></br>
        </br><button onClick="window.location.href='logg_out.php'">Logg ut</button>
    </body>
</html>

<?php
    require_once 'db.php';
    include 'SkirennKlasser.php';
?>

<html>
    <head>
        <title>Skirennregister</title> 
    </head>
    <body>
        <h1>Skirennregister</h1>
        <h3>Vennligst logg inn for å gjøre endringer:</h3>
        <form action="" method="post">
            <table>
                <tr>
                    <td>Brukernavn:</td>
                    <td><input type="text" name="brukernavn"></td>
                </tr>
                <tr>
                    <td>Passord:</td>
                    <td><input type="text" name="passord"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="loggInn" value="Logg Inn"></td>
                </tr>
            </table>
        </form>
        <h3>Trykk på 'Deltakeroversikt' for oversikt</h3>
        <form action="deltakeroversikt.php" method="">
            <table>
                <tr>
                    <td><input type="submit" value="Deltakeroversikt"></td>
                </tr>
            </table>
        </form>
    </body>  
</html>

<?php
$brukernavn = $_POST["brukernavn"];
$passord = $_POST["passord"];



?>




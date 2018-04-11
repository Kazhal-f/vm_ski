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
        <h3>Registrer deg som publikum her:</h3>
        <form action="utover_publikum.php" method="post">
            <table>
                <tr>
                    <td>Fornavn:</td>
                    <td><input type="text" name="fornavn"></td>
                </tr>
                <tr>
                    <td>Etternavn:</td>
                    <td><input type="text" name="etternavn"></td>
                </tr>
                <tr>
                    <td>Adresse:</td>
                    <td><input type="text" name="adresse"></td>
                </tr>
                <tr>
                    <td>Postnr:</td>
                    <td><input type="text" name="postnr"></td>
                </tr>
                <tr>
                    <td>Poststed:</td>
                    <td><input type="text" name="poststed"></td>
                </tr>
                <tr>
                    <td>Telefon:</td>
                    <td><input type="text" name="tlf"></td>
                </tr>
            </table>
        </form> 
        <h3>Vennligst logg inn her for å gjøre admin-endringer:</h3>
        <form action="" method="post">
            <table>
                <tr>
                    <td>Brukernavn:</td>
                    <td><input type="text" name="brukernavn"></td>
                </tr>
                <tr>
                    <td>Passord:</td>
                    <td><input type="password" name="passord"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="logg_inn_admin" value="Logg Inn"></td>
                </tr>
            </table>
        </form>
        <h3>Vennligst logg inn her for å endre deltaker og øvelser:</h3>
        <form action="" method="post">
            <table>
                <tr>
                    <td>Brukernavn:</td>
                    <td><input type="text" name="brukernavn"></td>
                </tr>
                <tr>
                    <td>Passord:</td>
                    <td><input type="password" name="passord"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="logg_inn_bruker" value="Logg Inn"></td>
                </tr>
            </table>
        </form>
        <h3>Trykk på 'Deltakeroversikt' for oversikten:</h3>
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



?>




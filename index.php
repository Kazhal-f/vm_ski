<?php

require_once 'db.php';
include 'SkirennKlasser.php';
include 'feilhandtering.php';


?>
<html>
    <head>
        <title>Skirennregister</title> 
    </head>
    <body>
        <h1>Skirennregister</h1>
        <h3>Vennligst fyll inn dine opplysninger:</h3>
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
                <tr>
                    <td>Utøver</td>
                    <td><input type="radio" name="valg" value="utover"></td>
                </tr>
                <tr>
                    <td>Publikum</td>
                    <td><input type="radio" name="valg" value="publikum"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="registrer" value="Registrer"></td>
                </tr>
            </table>
        </form> 
        <h3>Trykk her på 'Redigering' for å komme til slett og legg til siden</h3>
        <form action="ovelse.php" method="">
            <table>
                <tr>
                    <td><input type="submit" value="Redigering"></td>
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




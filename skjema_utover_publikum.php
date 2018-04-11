<html>
    <head>
        <title>Skirennregister</title> 
    </head>
    <body>
        <h1>Skirennregister</h1>
        <h3>Registrer deg som utøver her:</h3>
        <form action="" method="post">
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
                    <td><input type="submit" name="registrer" value="Registrer"></td>
                </tr>
            </table>
        </form>
    </body>
</html>
<?php
if (isset($_REQUEST["registrer"])) {
            //UTOVER
            if ($_REQUEST["valg"] == "utover") {
            
                $utover = new utover;
                $utover->set_fornavn($_REQUEST['fornavn']);
                $utover->set_etternavn($_REQUEST['etternavn']);
                $utover->set_telefonnr($_REQUEST['tlf']);
                $utover->set_adresse($_REQUEST['adresse']);
                $utover->set_postnr($_REQUEST['postnr']);
                $utover->set_poststed($_REQUEST['poststed']);
                
                $_SESSION["utover"] = serialize($utover);
                
                //REGEX
                $OK = true;
                
                if (! $utover->valider_fornavn($utover->get_fornavn())) {
                    echo "Feil format på fornavn.</br>";
                    $OK = false;
                }
                
                if (! $utover->valider_etternavn($utover->get_etternavn())) {
                    echo "Feil format på etternavn.</br>";
                    $OK = false;
                }
                
                if (! $utover->valider_adresse($utover->get_adresse())) {
                    echo "Feil format på adresse.</br>";
                    $OK = false;
                }
                
                if (! $utover->valider_postnr($utover->get_postnr())) {
                    echo "Feil format på postnr. Må være fire siffer.</br>";
                    $OK = false;
                }
                
                if (! $utover->valider_poststed($utover->get_poststed())) {
                    echo "Feil format på poststed.</br>";
                    $OK = false;
                }
                
                if (! $utover->valider_telefonnr($utover->get_telefonnr())) {
                    echo "Feil format, vennligst skriv et norsk telefonnummer med åtte siffer.</br>";
                    $OK = false;
                }
                
                if (!$OK) {
                    echo '<form action="index.php" method="">
                            <table>
                                <tr>
                                    <td><input type="submit" value="Tilbake til forsiden"></td>
                                </tr>
                            </table>
                        </form>';
                    echo '<h3>Gå tilbake til forsiden for å rette opp feil i formateringen.</h3>';
                }
                
                if ($OK) {
                    echo '<h3>Skriv inn nasjonalitet og velg øvelse</h3>';
                    echo '<form action="bekreftelse.php" method="post">
                            <table>
                                <tr>
                                    <td>Nasjonalitet:</td>
                                    <td><input type="text" name="nasjonalitet"></td>
                                </tr>
                                <tr>
                                    <td>Skriv inn ØvelseId:</td>
                                    <td><input type="text" name="ovelseId"></td>
                                </tr>
                                <tr>
                                    <td><input type="submit" name="registrerutover" value="Registrer"></td>
                                </tr>
                            </table>
                        </form>';
                }

                
            }
}
?>


<?php
    include 'SkirennKlasser.php';
    session_start();
    require_once 'db.php';
?>

<html>
    <head>
        <title>Skirennregister</title>
    </head>
    <body>
       <?php
        
        if (isset($_REQUEST["registrer"])) {
            //PUBLIKUM
                $publikum = new publikum;
                $publikum->set_fornavn($_REQUEST['fornavn']);
                $publikum->set_etternavn($_REQUEST['etternavn']);
                $publikum->set_telefonnr($_REQUEST['tlf']);
                $publikum->set_adresse($_REQUEST['adresse']);
                $publikum->set_postnr($_REQUEST['postnr']);
                $publikum->set_poststed($_REQUEST['poststed']);
                
                $_SESSION["publikum"] = serialize($publikum);
                
                //REGEX
                $OK = true;
                
                if (! $publikum->valider_fornavn($publikum->get_fornavn())) {
                    echo "Feil format på fornavn.</br>";
                    $OK = false;
                }
                
                if (! $publikum->valider_etternavn($publikum->get_etternavn())) {
                    echo "Feil format på etternavn.</br>";
                    $OK = false;
                }
                
                if (! $publikum->valider_adresse($publikum->get_adresse())) {
                    echo "Feil format på adresse.</br>";
                    $OK = false;
                }
                
                if (! $publikum->valider_postnr($publikum->get_postnr())) {
                    echo "Feil format på postnr. Må være fire siffer.</br>";
                    $OK = false;
                }
                
                if (! $publikum->valider_poststed($publikum->get_poststed())) {
                    echo "Feil format på poststed.</br>";
                    $OK = false;
                }
                
                if (! $publikum->valider_telefonnr($publikum->get_telefonnr())) {
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
                    
                    echo '<h3>Billettype</3>
                        <form action="bekreftelse.php" method="post">
                            <p><strong>Velg type bilett under:</strong></p>
                            <select name="billettype" size="1" value="billettype">
                                <option></option>
                                <option>Normal Billett</option>
                                <option>VIP Billett</option>

                            </select>
                                <p><strong>Velg øvelse ved å skrive inn ØvelseId fra listen under</strong></p>
                                <tr>
                                    <td><input type="text" name="ovelseId"></td>
                                </tr>
                            <table>
                                <tr>
                                    <td><input name="registrerpublikum" type="submit" value="Registrer"></td>
                                </tr>
                            </table>
                        </form>';
                }

                
            //}
            
            
            
        }
        
        //VIS OVELSER
        $sql = "SELECT * FROM ovelse";
        $resultat = $db->query($sql);
        $antallRader = $db->affected_rows;

        echo '<table border=1>
                <tr><td>ØvelseId</td><td>Øvelse</td><td>Dato</td><td>Tid</td><td>Sted</td></tr>';

        for ($i=0;$i<$antallRader;$i++) {
            $radObjekt = $resultat->fetch_object();
            echo "<tr><td>".$radObjekt->ovelseId."</td><td>".$radObjekt->ovelse."</td><td>".$radObjekt->dato."</td><td>".$radObjekt->tid."</td><td>".$radObjekt->sted."</td></tr>";
        }
        echo '</table>';
        ?> 
    </body>
</html>



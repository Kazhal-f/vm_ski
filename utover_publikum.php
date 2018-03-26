<?php
        session_start();
        require_once 'db.php';
        include 'SkirennKlasser.php';
        include 'feilhandtering.php';
        ?>
<html>
    <head>
        <title></title>
    </head>
    <body>
       <?php
        
        if (isset($_REQUEST["registrer"])) {
            //UTOVER
            if ($_REQUEST["valg"] == "utover") {
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
                    </table>';
            
            $utover = new utover;
            $utover->set_fornavn($_REQUEST['fornavn']);
            $utover->set_etternavn($_REQUEST['etternavn']);
            $utover->set_telefonnr($_REQUEST['tlf']);
            $utover->set_adresse($_REQUEST['adresse']);
            $utover->set_postnr($_REQUEST['postnr']);
            $utover->set_poststed($_REQUEST['poststed']);
            
            $_SESSION["utover"] = serialize($utover);
            }
            
            //PUBLIKUM
            if ($_REQUEST["valg"] == "publikum") {
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

                $publikum = new publikum;
                $publikum->set_fornavn($_REQUEST['fornavn']);
                $publikum->set_etternavn($_REQUEST['etternavn']);
                $publikum->set_telefonnr($_REQUEST['tlf']);
                $publikum->set_adresse($_REQUEST['adresse']);
                $publikum->set_postnr($_REQUEST['postnr']);
                $publikum->set_poststed($_REQUEST['poststed']);

                $_SESSION["publikum"] = serialize($publikum);
            }
            
            
            
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



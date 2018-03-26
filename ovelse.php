<?php
        session_start();
        require_once 'db.php';
        include "SkirennKlasser.php";
        ?>
<html>
    <head>
        <title>Skirennregister</title> 
    </head>
    <body>
        <form action="index.php" method="">
            <table>
                <tr>
                    <td><input type="submit" value="Tilbake til forsiden"></td>
                </tr>
            </table>
        </form> 
        <h3>Legg til øvelse her:</h3>
        <form action="" method="post">
            <table>
                <tr>
                    <td>Type:</td>
                    <td><input type="text" name="type"></td>
                </tr>
                <tr>
                    <td>Dato:</td>
                    <td><input type="text" name="dato"></td>
                </tr>
                <tr>
                    <td>Tid:</td>
                    <td><input type="text" name="tid"></td>
                </tr>
                <tr>
                    <td>Sted:</td>
                    <td><input type="text" name="sted"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="legg" value="Legg til"></td>
                </tr>
            </table>
        </form> 
        <h3>Endre øvelse her:</h3>
        <form action="" method="post">
            <table>
                <tr>
                    <td>ØvelsesId</td>
                    <td><input type='text' name='ovelsesId'></td>
                </tr>
                <tr>
                    <td>Type:</td>
                    <td><input type="text" name="type"></td>
                </tr>
                <tr>
                    <td>Dato:</td>
                    <td><input type="text" name="dato"></td>
                </tr>
                <tr>
                    <td>Tid:</td>
                    <td><input type="text" name="tid"></td>
                </tr>
                <tr>
                    <td>Sted:</td>
                    <td><input type="text" name="sted"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="endre" value="Endre"></td>
                </tr>
            </table>
        </form>
        <h3>Skriv inn ØvelsesId for å oppdatere eller slette øvelse</h3>
        <form action='' method='post'>
            <table>
                <tr>
                    <td><input type='text' name='ovelses_id'></td>
                </tr>
                <tr>
                    <td><input type='submit' name='slett' value='Slett'></td>
                </tr>
                
            </table>
        </form>
    </body>  
</html>
<?php

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

//LEGG TIL
if (isset($_REQUEST['legg'])) {
    $ovelse = new ovelse;
            $ovelse->set_type($_REQUEST['type']);
            $ovelse->set_dato($_REQUEST['dato']);
            $ovelse->set_tid($_REQUEST['tid']);
            $ovelse->set_sted($_REQUEST['sted']);
    
    $OK = false;
    
    //REGEX LEGG TIL
    if(! $ovelse->valider_type($ovelse->get_type())) {
            echo "Brukt riktige tegn!<br>";
            $OK = false;
        } 
        else {
            $OK = true;
        }
        
    if(! $ovelse->valider_dato($ovelse->get_dato())) {
            echo "Feil format på dato. Eks 23.01.2018<br>";
            $OK = false;
        } 
        else {
            $OK = true;
        }
    
    if(! $ovelse->valider_tid($ovelse->get_tid())) {
            echo "Feil format på tid. For eks 12:00<br>";
            $OK = false;
        } 
        else {
            $OK = true;
        }
    
    if(! $ovelse->valider_sted($ovelse->get_sted())) {
            echo "Feil format på sted<br>";
            $OK = false;
        } 
        else {
            $OK = true;
        }
        
        if($OK) {
        mysqli_query($db, "INSERT INTO ovelse(ovelse, dato, tid, sted)
                    VALUES ('" . $ovelse->get_type() . "','" . $ovelse->get_dato() . "','" . $ovelse->get_tid() . "','" . $ovelse->get_sted() . "') ");
        $resultat = $db->query($sql);
        }
    /*if (!$ovelse->)
            
            mysqli_query($db, "INSERT INTO ovelse(ovelse, dato, tid, sted)
                    VALUES ('" . $ovelse->get_ovelse() . "','" . $ovelse->get_dato() . "','" . $ovelse->get_tid() . "','" . $ovelse->get_sted() . "') ");
 */         
}

//UPDATE
if (isset($_REQUEST['endre'])) {
    
    $ovelse = new ovelse;
            $ovelse->set_type($_REQUEST['type']);
            $ovelse->set_dato($_REQUEST['dato']);
            $ovelse->set_tid($_REQUEST['tid']);
            $ovelse->set_sted($_REQUEST['sted']);
    $id=$_REQUEST["ovelsesId"];
    
    //REGEX OBJEKT
    $OK = true;
    
    if(! $ovelse->valider_type($ovelse->get_type())) {
            echo "Brukt riktige tegn!<br>";
            $OK = false;
        } 
        
    if(! $ovelse->valider_dato($ovelse->get_dato())) {
            echo "Feil format på dato. Eks 23.01.2018<br>";
            $OK = false;
        } 

    if(! $ovelse->valider_tid($ovelse->get_tid())) {
            echo "Feil format på tid. For eks 12:00<br>";
            $OK = false;
        } 

    if(! $ovelse->valider_sted($ovelse->get_sted())) {
            echo "Feil format på sted<br>";
            $OK = false;
        } 

        
    if($OK) {
        $sql = 'UPDATE ovelse SET ovelse="'.$ovelse->get_type().'", dato="'.$ovelse->get_dato().'", tid="'.$ovelse->get_tid().'", sted="'.$ovelse->get_sted().'" WHERE ovelseId="'.$id.'"';
        $resultat = $db->query($sql);
        }
    
    
    
    
    
    /*
    if ($db->query($sql) === TRUE) {
    echo "Record updated successfully";
    } else {
    echo "Error updating record: " . $db->error;
    }*/
}

//SLETT
if (isset($_REQUEST['slett'])) {
    $slettmeg= $_REQUEST["ovelses_id"];
    $sql = 'DELETE FROM ovelse WHERE ovelseID="'.$slettmeg.'"';
    $resultat = $db->query($sql);
    
}
?>


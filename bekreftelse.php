<?php
    include 'SkirennKlasser.php';
    session_start();
    require_once 'db.php';
?>
<!DOCTYPE html>
<html>
    <body>
        <form action="index.php" method="">
            <table>
                <tr>
                    <td><input type="submit" value="Tilbake til forsiden"></td>
                </tr>
            </table>
        </form>    
<?php
//UTOVER
        if (isset($_REQUEST["registrerutover"])) {
            
            
            //REGEX
            $OK = true;
            
            
            
            

            

            echo "<h3>Du ble registrert med informasjonen:</h3>";
            //TESTE OUTPUT
            echo $utover->get_fornavn() . "<br>";
            echo $utover->get_etternavn() . "<br>";
            echo $utover->get_adresse() . "<br>";
            echo $utover->get_postnr() . "<br>";
            echo $utover->get_poststed() . "<br>";
            echo $utover->get_telefonnr() . "<br>";
            echo $utover->get_nasjonalitet();
        }
//PUBLIKUM
        if (isset($_REQUEST["registrerpublikum"])) {
            $publikum = unserialize($_SESSION["publikum"]);
            $publikum->set_billettype($_REQUEST["billettype"]);
            //var_dump($publikum);
            $ovelseId = $_REQUEST["ovelseId"];
            
            //REGEX
            $OK = true;
            
            if (!preg_match('/^[0-9]{1,1000}$/', $ovelseId)) {
                echo "Feil format på ØvelsesId. Skriv kun tallet på den øvelsen du ønsker å endre.</br>";
                $OK = false;
            }
            
            if ($OK) {
                mysqli_query($db, "INSERT INTO Person(Fornavn, Etternavn, Adresse, PostNr, Poststed, TelefonNr)
                    VALUES ('" . $publikum->get_fornavn() . "','" . $publikum->get_etternavn() . "','" . $publikum->get_adresse() . "','" . $publikum->get_postnr() . "',
                    '" . $publikum->get_poststed() . "','" . $publikum->get_telefonnr() . "') ");
            
                mysqli_query($db, "INSERT INTO publikum (personId, BilettType, ovelseId) VALUES ( LAST_INSERT_ID(), '".$publikum->get_billettype()."', '".$ovelseId."' )" );
            }

            
            //TESTE OUTPUT
            echo "<h3>Du ble registrert med infoen</h3></br>";
            echo $publikum->get_fornavn() . "<br>";
            echo $publikum->get_etternavn() . "<br>";
            echo $publikum->get_adresse() . "<br>";
            echo $publikum->get_postnr() . "<br>";
            echo $publikum->get_poststed() . "<br>";
            echo $publikum->get_telefonnr() . "<br>";
            echo $publikum->get_billettype();
        }
        ?>
    </body>
</html>
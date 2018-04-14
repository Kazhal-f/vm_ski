<?php
session_start();
require_once 'db.php';
include 'test_logginn.php';
include 'SkirennKlasser.php';
?>
<html>
    <head>
        <title>Skirennregister</title> 
        <script type="text/javascript">
            //UTOVER JS REGEX
            function valider_navn() {
                regEx = /^[a-åA-Å.\-]{3,20}$/;
                OK = regEx.test(document.utover.fornavn.value);
            if (!OK) {
                document.getElementById("feilFornavn").innerHTML="Feil format i fornavnet";
                return false;
            }
            document.getElementById("feilFornavn").innerHTML="";
            return true; }
        
            function valider_etternavn() {
                regEx = /^[a-åA-Å.\-]{3,30}$/;
                OK = regEx.test(document.utover.etternavn.value);
            if (!OK) {
                document.getElementById("feilEtternavn").innerHTML="Feil format i etternavnet";
                return false;
            }
            document.getElementById("feilEtternavn").innerHTML="";
            return true; }
        
            function valider_adresse() {
                regEx = /^[a-åA-Å0-9. \-]{3,30}$/;
                OK = regEx.test(document.utover.adresse.value);
            if (!OK) {
                document.getElementById("feilAdresse").innerHTML="Feil format i adressen";
                return false;
            }
            document.getElementById("feilAdresse").innerHTML="";
            return true; }
        
            function valider_postnr() {
                regEx = /^[0-9]{4}$/;
                OK = regEx.test(document.utover.postnr.value);
            if (!OK) {
                document.getElementById("feilPostnr").innerHTML="Feil i postnummeret";
                return false;
            }
            document.getElementById("feilPostnr").innerHTML="";
            return true; }
        
            function valider_poststed() {
                regEx = /^[a-åA-Å0-9.\-]{3,30}$/;
                OK = regEx.test(document.utover.poststed.value);
            if (!OK) {
                document.getElementById("feilPoststed").innerHTML="Feil format i poststed";
                return false;
            }
            document.getElementById("feilPoststed").innerHTML="";
            return true; }
        
            function valider_tlf() {
                regEx = /^[0-9]{8}$/;
                OK = regEx.test(document.utover.tlf.value);
            if (!OK) {
                document.getElementById("feilTlf").innerHTML="Feil format. Kun norske numre";
                return false;
            }
            document.getElementById("feilTlf").innerHTML="";
            return true; }
        
            function valider_nasjonalitet() {
                regEx = /^[a-åA-Å0-9.\-]{3,30}$/;
                OK = regEx.test(document.utover.nasjonalitet.value);
            if (!OK) {
                document.getElementById("feilNasjonalitet").innerHTML="Feil format i nasjonalitet";
                return false;
            }
            }
            
            function valider_ovelseid() {
                regEx = /^[0-9]{1,4}$/;
                OK = regEx.test(document.utover.ovelseId.value);
            if (!OK) {
                document.getElementById("feilOvelseId").innerHTML="Feil format på øvelseid";
                return false;
            }
            document.getElementById("feilOvelseId").innerHTML="";
            return true;
            }
        </script>
    </head>
    <body>
        <h1>Skirennregister</h1>
        <h3>Registrer deg som utøver her:</h3>
        <form action="" method="post" name="utover">
            <table>
                <tr>
                    <td>Fornavn:</td>
                    <td><input type="text" name="fornavn" onchange="valider_navn()"></td>
                    <td><div id="feilFornavn">*</div></td>
                </tr>
                <tr>
                    <td>Etternavn:</td>
                    <td><input type="text" name="etternavn" onChange="valider_etternavn()"></td>
                    <td><div id="feilEtternavn">*</div></td>
                </tr>
                <tr>
                    <td>Adresse:</td>
                    <td><input type="text" name="adresse" onchange="valider_adresse()"></td>
                    <td><div id="feilAdresse">*</div></td>
                </tr>
                <tr>
                    <td>Postnr:</td>
                    <td><input type="text" name="postnr" onchange="valider_postnr()"></td>
                    <td><div id="feilPostnr">*</div></td>
                </tr>
                <tr>
                    <td>Poststed:</td>
                    <td><input type="text" name="poststed" onchange="valider_poststed()"></td>
                    <td><div id="feilPoststed">*</div></td>
                </tr>
                <tr>
                    <td>Telefon:</td>
                    <td><input type="text" name="tlf" onchange="valider_tlf()"></td>
                    <td><div id="feilTlf">*</div></td>
                </tr>
                <tr>
                    <td>Nasjonalitet:</td>
                    <td><input type="text" name="nasjonalitet" onchange="valider_nasjonalitet()"></td>
                    <td><div id="feilNasjonalitet">*</div></td>
                </tr>
                <tr>
                    <td>Skriv inn ØvelseId:</td>
                    <td><input type="text" name="ovelseId" onchange="valider_ovelseid"></td>
                    <td><div id="feilOvelseId">*</div></td>
                </tr>
                <tr>
                    <td><input type="submit" name="registrer" value="Registrer"></td>
                </tr>
            </table>
        </form>
    </body>
</html>
<?php
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
        
//REGISTRERING
if (isset($_REQUEST["registrer"])) {
            //UTOVER
            $utover = new utover;
            $utover->set_fornavn($_REQUEST['fornavn']);
            $utover->set_etternavn($_REQUEST['etternavn']);
            $utover->set_telefonnr($_REQUEST['tlf']);
            $utover->set_adresse($_REQUEST['adresse']);
            $utover->set_postnr($_REQUEST['postnr']);
            $utover->set_poststed($_REQUEST['poststed']);
            //$utover = unserialize($_SESSION["utover"]);
            $utover->set_nasjonalitet($_REQUEST["nasjonalitet"]);
            $ovelseId = $_REQUEST["ovelseId"];

            //$_SESSION["utover"] = serialize($utover);

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
            
            if (!preg_match('/^[0-9]{1,1000}$/', $ovelseId)) {
                echo "Feil format på ØvelsesId. Skriv kun tallet på den øvelsen du ønsker å endre.</br>";
                $OK = false;
            }
            
            if (! $utover->valider_nasjonalitet($utover->get_nasjonalitet())) {
                    echo "Feil format på nasjonalitet.</br>";
                    $OK = false;
            }
            
            if ($OK) {
                mysqli_query($db, "INSERT INTO Person(Fornavn, Etternavn, Adresse, PostNr, Poststed, TelefonNr)
                    VALUES ('" . $utover->get_fornavn() . "','" . $utover->get_etternavn() . "','" . $utover->get_adresse() . "','" . $utover->get_postnr() . "',
                    '" . $utover->get_poststed() . "','" . $utover->get_telefonnr() . "') ");
            
                mysqli_query($db, "INSERT INTO Utover (personId, Nasjonalitet, ovelseId) VALUES ( LAST_INSERT_ID(), '".$utover->get_nasjonalitet()."', '".$ovelseId."')");
                $resulat = mysqli_query($db, $sql);
                if($resulat) {
                    echo "Registrert";
                }
                else {
                    echo "Feilet";
                }
            }
        }
?>


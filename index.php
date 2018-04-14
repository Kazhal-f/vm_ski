<?php
    ob_start();
    session_start();
    require_once 'db.php';
    include 'SkirennKlasser.php';
    ?>
<html>
    <head>
        <title>Skirennregister</title> 
        <script type="text/javascript">
            //PUBLIKUM JS REGEX
            function valider_navn() {
                regEx = /^[a-åA-Å.\-]{3,20}$/;
                OK = regEx.test(document.publikum.fornavn.value);
            if (!OK) {
                document.getElementById("feilFornavn").innerHTML="Feil format i fornavnet";
                return false;
            }
            document.getElementById("feilFornavn").innerHTML="";
            return true; }
        
            function valider_etternavn() {
                regEx = /^[a-åA-Å.\-]{3,30}$/;
                OK = regEx.test(document.publikum.etternavn.value);
            if (!OK) {
                document.getElementById("feilEtternavn").innerHTML="Feil format i etternavnet";
                return false;
            }
            document.getElementById("feilEtternavn").innerHTML="";
            return true; }
        
            function valider_adresse() {
                regEx = /^[a-åA-Å0-9. \-]{3,30}$/;
                OK = regEx.test(document.publikum.adresse.value);
            if (!OK) {
                document.getElementById("feilAdresse").innerHTML="Feil format i adressen";
                return false;
            }
            document.getElementById("feilAdresse").innerHTML="";
            return true; }
        
            function valider_postnr() {
                regEx = /^[0-9]{4}$/;
                OK = regEx.test(document.publikum.postnr.value);
            if (!OK) {
                document.getElementById("feilPostnr").innerHTML="Feil i postnummeret";
                return false;
            }
            document.getElementById("feilPostnr").innerHTML="";
            return true; }
        
            function valider_poststed() {
                regEx = /^[a-åA-Å0-9.\-]{3,30}$/;
                OK = regEx.test(document.publikum.poststed.value);
            if (!OK) {
                document.getElementById("feilPoststed").innerHTML="Feil format i poststed";
                return false;
            }
            document.getElementById("feilPoststed").innerHTML="";
            return true; }
        
            function valider_tlf() {
                regEx = /^[0-9]{8}$/;
                OK = regEx.test(document.publikum.tlf.value);
            if (!OK) {
                document.getElementById("feilTlf").innerHTML="Feil format. Kun norske numre";
                return false;
            }
            document.getElementById("feilTlf").innerHTML="";
            return true; }
        
            //LOGGINN JS REGEX
            function valider_brukernavn() {
                regEx = /^[a-åA-Å.\-]{3,30}$/;
                OK = regEx.test(document.logginn.brukernavn.value);
            if (!OK) {
                document.getElementById("feilBrukernavn").innerHTML="Feil format. Kun norske numre";
                return false;
            }
            document.getElementById("feilBrukernavn").innerHTML="";
            return true; }
        </script>
    </head>
    <body>
        <h1>Skirennregister</h1>
        <h3>Registrer deg som publikum her:</h3>
        <form action="utover_publikum.php" method="post" name="publikum">
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
                    <td><input type="submit" name="registrer" value="Registrer"></td>
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
        <h3>Vennligst logg inn her for å komme til administrasjonssiden:</h3>
        <form action="" method="post" name="logginn">
            <table>
                <tr>
                    <td>Brukernavn:</td>
                    <td><input type="text" name="brukernavn" onchange="valider_brukernavn()"></td>
                    <td><div id="feilBrukernavn">*</div></td>
                </tr>
                <tr>
                    <td>Passord:</td>
                    <td><input type="password" name="passord"></td>
                    <td><div id="feilPassord">*</div></td>
                </tr>
                <tr>
                    <td><input type="submit" name="logg_inn_bruker" value="Logg Inn"></td>
                </tr>
            </table>
        </form>
    </body>  
</html>
<?php
//SJEKK LOGGINN
if (isset($_POST["logg_inn_bruker"])) {
    $passord = md5($_POST["passord"]);
    $sjekk_passord=$passord;
    $brukernavn = $_POST["brukernavn"];
    $sql = "SELECT passord FROM brukere WHERE brukernavn ='$brukernavn'";
    $resultat = $db->query($sql);
    $_SESSION["loggetInn"]=false;
    
    $ok = false;
    if($db->affected_rows >=1) {
        $rad = $resultat->fetch_object();
        $passordHash = $rad->passord;
        if ($passordHash == $passord) {
           $ok = true;
        }
    if($ok) {
        $_SESSION["loggetInn"]=true;
        header("location: ./logginn.php");
        }
    if (!$ok) {
        echo "</br>Passordet stemte ikke med brukernavnet du skrev inn!";
    }
    }
    
    //SJEKK LOGGINN PHP
    $username = $_POST["brukernavn"];
    $password = $_POST["passord"];
    
    if (!preg_match("/^[A-Za-z][A-Za-z0-9]{3,30}$/", $username))
    {
    echo "Feil i brukernavnet, må være mellom 3 og 30 tegn!<br/>";
    $OK=false;
    } 
    if (!preg_match("/^[A-Za-z][A-Za-z0-9]{3,30}$/", $password))
    {
    echo "Feil format i passord!<br/>";
    $OK=false;
    }
}
?>
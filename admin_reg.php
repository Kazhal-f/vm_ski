<?php
session_start();
require_once 'db.php';
include 'test_logginn.php';
?>
<html>
            <head>
                <title>Skirennregister</title>
                <script type="text/javascript">
                    //ADMINREG JS REGEX
//                    function valider_brukernavn() {
//                        regEx = /^[a-åA-Å.\-]{3,20}$/;
//                        OK = regEx.test(document.admin_reg.brukernavn.value);
//                    if (!OK) {
//                        document.getElementById("feilBrukernavn").innerHTML="Feil format i brukernavnet";
//                        return false;
//                    }
//                    document.getElementById("feilBrukernavn").innerHTML="";
//                    return true; 
//                    }
                    
                    function valider_username() {
                        regEx = /^[a-åA-Å.\-]{3,20}$/;
                        OK = regEx.test(document.admin_reg.brukernavn.value);
                    if (!OK) {
                        document.getElementById("feilUsername").innerHTML="Feil format i brukernavnet";
                        return false;
                    }
                    document.getElementById("feilUsername").innerHTML="";
                    return true; 
                    }
                    
                    function valider_navn() {
                        regEx = /^[a-åA-Å.\-]{3,20}$/;
                        OK = regEx.test(document.admin_reg.fornavn.value);
                    if (!OK) {
                        document.getElementById("feilFornavn").innerHTML="Feil format i fornavnet";
                        return false;
                    }
                    document.getElementById("feilFornavn").innerHTML="";
                    return true; 
                    }

                    function valider_etternavn() {
                        regEx = /^[a-åA-Å.\-]{3,30}$/;
                        OK = regEx.test(document.admin_reg.etternavn.value);
                    if (!OK) {
                        document.getElementById("feilEtternavn").innerHTML="Feil format i etternavnet";
                        return false;
                    }
                    document.getElementById("feilEtternavn").innerHTML="";
                    return true; 
                    }
                    function valider_epost() {
                        regEx = /^[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
                        OK = regEx.test(document.admin_reg.epost.value);
                    if (!OK) {
                        document.getElementById("feilEpost").innerHTML="Feil format i epost";
                        return false;
                    }
                    document.getElementById("feilEpost").innerHTML="";
                    return true;
                    }
                </script>
            </head>
            <body>
                <h1>Administrator</h1>
                <h3>Vennligst skriv inn hvem du ønsker å registrere:</h3>
                <form action="" method="post" name="admin_reg">
                    <table>
                        <tr>
                            <td>Brukernavn:</td>
                            <td><input type="text" name="brukernavn" onchange="valider_username()"</td>
                            <td><div id="feilUsername">*</div></td>
                        </tr>
                        <tr>
                            <td>Passord:</td>
                            <td><input type="password" name="passord"></td>
                        </tr>
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
                            <td>Epost:</td>
                            <td><input type="text" name="epost" onchange="valider_epost()"></td>
                            <td><div id="feilEpost">*</div></td>
                        </tr>
                        <tr>
                            <td><input type="submit" name="registrer" value="Registrer"></td>
                        </tr>
                    </table>
                </form>
            </body>  
        </html>

<?php
if(isset($_POST["registrer"])) {
    //REGEX PHP
    $user = $_POST["brukernavn"];
    $forN = $_POST["fornavn"];
    $etterN = $_POST["etternavn"];
    $email = $_POST["epost"];
    
    $OK = TRUE;
    if (!preg_match("/^[A-Za-z][A-Za-z0-9]{3,30}$/", $user)) {
        echo "Feil i brukernavnet, må være mellom 3 og 30 tegn!<br/>";
        $OK=false;
    } 
    if (!preg_match("/^[A-Za-z][A-Za-z0-9]{3,30}$/", $forN)) {
        echo "Feil i fornavnet, må være mellom 3 og 30 tegn!<br/>";
        $OK=false;
    }
    if (!preg_match("/^[A-Za-z][A-Za-z0-9]{3,30}$/", $etterN)) {
        echo "Feil i etternavnet, må være mellom 3 og 30 tegn!<br/>";
        $OK=false;
    }
    if (!preg_match("/^[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/", $email)) {
        echo "Feil i epost-format!<br/>";
        $OK=false;
    }
    if ($OK) {
        //REGISTRERING AV BRUKERE
        $brukernavn = mysqli_real_escape_string($db, $_POST["brukernavn"]);
        $passord = md5($_POST["passord"]);
        $fornavn = mysqli_real_escape_string($db, $_POST["fornavn"]);
        $etternavn = mysqli_real_escape_string($db, $_POST["etternavn"]);
        $epost = mysqli_real_escape_string($db, $_POST["epost"]);

        $sql = "INSERT INTO brukere(brukernavn, passord, fornavn, etternavn, epost) VALUES ('$brukernavn', '$passord', '$fornavn', '$etternavn', '$epost')";
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


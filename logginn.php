<h3>Vennligst logg inn for å gjøre admin-endringer:</h3>
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
                    <td><input type="submit" name="logg_inn" value="Logg Inn"></td>
                </tr>
            </table>
        </form>
<?php
session_start();
require_once 'db.php';
if (isset($_POST["logg_inn"])) {
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
        header("location: ./admin_reg.php");
        }
    if (!$ok) {
        echo "Passordet stemte ikke med brukernavnet du skrev inn!";
    }
    }
}
?>


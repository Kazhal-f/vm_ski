<html>
    <head>
        <title>Skirennregister</title> 
    </head>
    <body>
        <h1>Skirennregister</h1>
        <h3>Vennligst skriv inn hvem du ønsker å registrere:</h3>
        <form action="" method="post">
            <table>
                <tr>
                    <td>Navn:</td>
                    <td><input type="text" name="navn"></td>
                </tr>
                <tr>
                    <td>Brukernavn:</td>
                    <td><input type="text" name="brukernavn"></td>
                </tr>
                <tr>
                    <td>Passord:</td>
                    <td><input type="password" name="passord"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="registrer" value="Registrer"></td>
                </tr>
            </table>
        </form>
    </body>  
</html>
<?php
session_start();

if(isset($_POST["registrer"])) {
    $brukernavn = mysqli_real_escape_string($db, $_POST["brukernavn"]);
    $passord = md5($_POST["passord"]);
    
    $sql = "INSERT INTO 'brukere' (brukernavn, passord) VALUES ('$brukernavn', '$passord')";
    $resulat = mysqli_query($db, $sql);
    if($resulat) {
        echo "Registrert";
    }
    else {
        echo "Feilet";
    }
}





?>


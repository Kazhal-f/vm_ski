<?php


if (isset($_REQUEST['registrer'])) {
    $fornavn = $_REQUEST['fornavn'];
    $etternavn = $_REQUEST['etternavn'];
    $adresse = $_REQUEST['adresse'];
    $postnr = $_REQUEST['postnr'];
    $poststed = $_REQUEST['poststed'];
    $tlf = $_REQUEST['tlf'];
    $valg = $_REQUEST['valg'];
    
    $OK = true;
    
    if (!preg_match('/^[a-zæøåA-Z.-]{2,20}$/', $fornavn)) {
        echo "Vennligst skriv fornavnet med lovlige tegn!";
        $OK = false;
    }
    if (!preg_match('/^[a-zæøåA-Z.-]{2,20}$/', $etternavn)) {
        echo "Vennligst skriv etternavnet med lovlige tegn!";
        $OK = false;
    }
    if (!preg_match('/^[0-9a-zA-ZæøåÆØÅ\ \-\.]{2,50}$/', $adresse)) {
        echo "Vennligst skriv adressen med lovlige tegn!";
        $OK = false;
    }
    if (!preg_match('/^[0-9]{4}$/', $postnr)) {
        echo "Feil i postnummer. Det må være fire siffer!";
        $OK = false;
    }
    if (!preg_match('/^[a-zæøåA-Z.-]{2,20}$/', $poststed)) {
        echo "Vennligst skriv poststed med lovlige tegn!";
        $OK = false;
    }
    if (!preg_match('/^[0-9]{8}$/', $tlf)) {
        echo "Vennligst skriv et norsk telefonnummer med åtte siffer!";
        $OK = false;
    }
    /*if ($OK == false) {
        header('location: index.php');
    }
    if (!preg_match('/^[]{2,20}$/', $valg)) {
        echo "Vennligst!";
        $OK = false;
    }*/
}





/*function validate ($field, $value) {
    switch ($field) {
        case 'fornavn':
            $regexp = "/^[a-zA-ZæøåÆØÅ\ \.\-]{2,50}$/";
            if (!preg_match($regexp, $value)) {
                return "<br/>Du har skrevet fornavnet i feil format. Vennligst bruk vanlige tegn";
            }
            break;
        case 'etternavn':
            $regexp = "/^[a-zA-ZæøåÆØÅ\ \.\-]{2,50}$/";
            if (!preg_match($regexp, $value)) {
                return "<br/>Du har skrevet fornavnet i feil format. Vennligst bruk vanlige tegn";
            }
            break;
        case 'adresse':
            $regexp = "/^[0-9a-zA-ZæøåÆØÅ\ \.\-]{2,50}$/";
            if(!preg_match($regexp, $value)){
              return "<br/>Adressen har feil format, skal være bokstaver, tall og mellomrom.";
            }
            break;
        case 'postnr':
            $regexp = "/^[0-9]{4}$/";
            if(!preg_match($regexp, $value)){
              return "<br/>Personnummeret har feil format, skal være 11 siffer.";
            }
            break;
        case 'Poststed':
            $regexp = "/^[a-zA-ZæøåÆØÅ\ \.\-]{2,50}$/";
            if(!preg_match($regexp, $value)){
              return "<br/>Poststed har feil format, skal være bokstaver eller '.', '-' eller ' '.";
            }
            break;
        case 'tlf':
            $regexp = "/^[0-9]{8}$/";
            if(!preg_match($regexp, $value)){
              return "<br/>Telefonnummeret har feil format, telefonnummer skal være i norsk format og skal være 8 siffer.";
            }
            break;
        case 'registrer':
            if($_SERVER['REQUEST_METHOD'] == 'POST'){ 
            $error_msg = array(); 
            if(!isset($_POST['valg'])){ 
                $error_msg[] = "Du må velge enten utøver eller publikum"; 
            }
            else{ 
            // redirect to the form again. 
            }
            break;
            }
}}

*/
?>

<?php
        session_start();
        require_once 'db.php';
        include "SkirennKlasser.php";
        ?>
<?php
echo '<form action="index.php" method="">
            <table>
                <tr>
                    <td><input type="submit" value="Tilbake til forsiden"></td>
                </tr>
            </table>
        </form> ';

//VIS PUBLIKUM OG OVELSE
$sql = "SELECT o.dato, o.tid, o.ovelse, o.sted, p.Fornavn, p.Etternavn FROM ovelse AS o, person AS p, 
               publikum AS pub WHERE p.id = pub.personId AND o.ovelseId = pub.ovelseId;";
$resultat = $db->query($sql);
$antallRader = $db->affected_rows;
echo '<h3>Publikum/Øvelse</h3>';
echo '<table border=1>
        <tr><td>Dato</td><td>Tid</td><td>Øvelse</td><td>Sted</td><td>Fornavn</td><td>Etternavn</td></tr>';

for ($i=0;$i<$antallRader;$i++) {
    $radObjekt = $resultat->fetch_object();
    echo "<tr><td>".$radObjekt->dato."</td><td>".$radObjekt->tid."</td><td>".$radObjekt->ovelse."</td><td>".$radObjekt->sted."</td><td>".$radObjekt->Fornavn."</td><td>".$radObjekt->Etternavn."</td></tr>";
}
echo '</table>';

//VIS UTOVERE OG OVELSE
$sql = "SELECT o.dato, o.tid, o.ovelse, o.sted, p.Fornavn, p.Etternavn FROM ovelse AS o, person AS p, utover AS u WHERE p.id = u.personId AND o.ovelseId = u.ovelseId";
$resultat = $db->query($sql);
$antallRader = $db->affected_rows;
echo '<h3>Utøver /Øvelse</h3>';
echo '<table border=1>
        <tr><td>Dato</td><td>Tid</td><td>Øvelse</td><td>Sted</td><td>Fornavn</td><td>Etternavn</td></tr>';

for ($i=0;$i<$antallRader;$i++) {
    $radObjekt = $resultat->fetch_object();
    echo "<tr><td>".$radObjekt->dato."</td><td>".$radObjekt->tid."</td><td>".$radObjekt->ovelse."</td><td>".$radObjekt->sted."</td><td>".$radObjekt->Fornavn."</td><td>".$radObjekt->Etternavn."</td></tr>";
}
echo '</table>';


?>


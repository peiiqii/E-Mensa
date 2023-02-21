<?php

$link = mysqli_connect(
    "localhost",
    "root",
    "root",
    "emensawerbeseite",
    3306
);

if (!$link) {
    echo "Verbindung fehlgeschlagen: ", mysqli_connect_error();
    exit();
}

$sql="SELECT * FROM gericht";

$result=mysqli_query($link,$sql);
if (!$result) {
    echo "Fehler während der Abfrage:  ", mysqli_error($link);
    exit();
}

echo '<table>';
echo '<tr>
        <th>ID</th> <th>Name</th> 
        <th>erfasst_am</th> 
        <th>vegetarisch</th> 
        <th>vegan</th> 
        <th>preis_intern</th> 
        <th>preis_extern</th>
       </tr>';

while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo '<td>'.$row['id'].'</td>';
    echo '<td>'.$row['name'].'</td>';
    echo '<td>'.$row['erfasst'].'</td>';
    echo '<td>'.$row['vegetarisch'].'</td>';
    echo '<td>'.$row['vegan'].'</td>';
    echo '<td>'.$row['preis_intern'].'</td>';
    echo '<td>'.$row['preis_extern'].'</td>';
    echo '</tr>';
}
echo '</table>';

mysqli_free_result($result);
mysqli_close($link);
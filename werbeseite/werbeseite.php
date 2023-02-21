<?php
/**
 * Praktikum DBWT. Autoren:
 * shuyang, zhang, 3270926
 * Pei Qi, Lim, 3530737
 */
include 'Gerichte.php';
global $Gerichte;
include "sqlanmelden.php";
global $link;
include "anzahl.php";
$result = mysqli_query($link,"insert into besucher(date) values (now())");
?>

<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <title>Ihre E-Mensa</title>
  <style>
    *{
      margin-left: 20px;
      margin-right: 20px;
      text-align: center;
    }
    header h1{
       margin: auto;
       font-size: 70px;
       width: 50%;
      font-style: italic;
     }
    header img{
      float: left;
      margin-top: 20px;
    }
    nav{
      margin: auto;
      overflow: hidden;
      background-color: #333;
    }
    nav a{
      float: left;
      display: block;
      color: #f2f2f2;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
      font-size: 25px;
    }
    .menu a:hover{
      background-color: lightgrey;
      color: black;
    }

    main img{
      float: left;
    }
    .Ankinhalt{
      border: 1px solid black;
      margin-left: 450px;
      text-align: justify;
      font-size: 18px;
    }
    table{
        margin-right: auto;
        margin-left: auto;
    }
    table,th,tr,td{
      border:1px solid black;
      border-collapse: collapse;
    }
    .Zahlrow {
      display: grid;
      grid-template-columns: auto auto auto;
    }
    .column {
      margin-left: 10px;
      float: left;
      width: 300px;
    }
    .form{
        margin-left: 300px;
        margin-right:300px;
    }
    .grid-container{
        display: grid;
        grid-template-columns: 60% 40%;
        margin-left: 10px;
    }
    ul{
      list-style-position: inside;
    }
    footer {
      font-size: 20px;
    }
  </style>
</head>

<body>
<header>
  <img src="img/emensa-logo.jpg" height="135" width="135" alt="E-Mensa Logo">
  <h1>E-Mensa</h1>
  <nav>
    <a href="#Ank">Ankündigung</a>
    <a href="#Speisen">Speisen</a>
    <a href="#Zahlen">Zahlen</a>
    <a href="#Kontakt">Kontakt</a>
    <a href="#wichtig">Wichtig für uns</a>
  </nav><br>
</header>
<hr>
<main>
  <img src="img/mensa-Eupener_Strasse.jpg" height="250" width="400" alt="Mensa Eupener Straße" />
  <h1><a id="Ank">Bald gibt es Essen auch online ;)</a></h1>
  <div class="Ankinhalt">
    Es gibt viele Gründe, Essen oder Nahrungsmittel zu bestellen.
    Nudeln mit Tomatensoße sind das einzige, was du kochen kannst.
    Oder du willst nicht einkaufen gehen.
    Lieferdienste bringen dir das Essen direkt vor die Haustür und bieten einen praktischen Ausweg.
    Somit ist es letztlich egal, ob du aus Faulheit nicht in den nächsten Supermarkt gehen willst, Sorge davor hast, dich anzustecken oder einfach Inspiration für dein nächstes Mittagessen brauchst.
    Es gibt verschiedene Ansätze, die Essenslieferdienste verfolgen.
    Die besten haben wir für dich in der Übersicht.
  </div><br><br><br>

  <div class="grid-container">
      <div class="grid-item">
      <h1 id="Speisen">Köstlichkeiten, die Sie erwarten</h1>
      <table>
        <tr>
          <th></th>
          <th>Preis intern</th>
          <th>Preis extern</th>
        </tr>
          <?php
          foreach ($Gerichte as $item) {
              echo '<tr>';
              echo '<td>' . $item['name'] . '</td>';
              echo '<td>' . $item['price intern'] . '</td>';
              echo '<td>' . $item['price extern'] . '</td>';
              echo '<td>' . $item['uebersicht'] . '</td>';
              echo '</tr>';
          }
          ?>
        <tr>
          <td>Rindfleisch mit Bambus, Kaiserschoten und rotem Paprika,dazu Nudeln</td>
          <td>3,50</td>
          <td>6,20</td>
        </tr>
        <tr>
          <td>Spinatrisotto mit kleinen Samosateigecken und gemischter Salat</td>
          <td>2.90</td>
          <td>5,30</td>
        </tr>
        <tr>
          <td>...</td>
          <td>...</td>
          <td>...</td>
        </tr>
      </table><br>
      </div>

    <div class="grid-item">
        <h1 id="wunsch">
            <h1>Wunschgericht</h1>
            <a href="wunschgericht.php"> wunschgericht </a>
            <?php include ('./wunschgericht.php'); ?>
        </h1>
    </div>
  </div>

  <h1 id="Zahlen">E-Mensa in Zahlen</h1>
  <div class="Zahlrow">
    <div class="column">
      <p> <?php sqlanfragen("SELECT count(*) FROM besucher",$link);?> Besuche</p>
    </div>
    <div class="column">
      <p><?php readanmeldungen();?> Anmeldungen zum Newsletter</p>
    </div>
    <div class="column">
      <p><?php sqlanfragen("SELECT count(*) FROM gericht",$link); ?> Speisen</p>
    </div>
  </div>



    <h1 id="Kontakt">Interesse geweckt? Wir informieren Sie!</h1>
    <div class="form"><?php include "newsletteranmeldung.php"?></div>

  <h1 id="wichtig">Das ist uns wichtig</h1>
  <ul>
    <li>Beste frishce Saisonale Zutaten</li>
    <li>Ausgewogene abwechslungsreiche Gerichte</li>
    <li>Sauberkeit</li>
  </ul>

  <h1 id="Text">Wir freuen uns auf Ihren Besuch!</h1>
</main>
<hr>
<footer>
  (c) E-Mensa GmbH | Peiqi Lim, Shuyang Zhang | <a href="">Impressum</a>
</footer>
</body>
</html>
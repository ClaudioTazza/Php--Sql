<!--
Realizzare una applicazione che tramite la scelta dei prodotti e quantità dei prodotti mi generi la somma da pagare.
Sapendo che se la somma da pagare è superiore di 100 euro la spedizione è gratuita,
se si possiede una carta fedeltà c'è lo sconto del 10%.
La spedizione costa 10 euro, gli sconti si sovrappongono.
-->
<!doctype html>

<html>
  <head>
    <meta charset="utf-8">
    <title>Php</title>
  </head>

  <body>

  <form action="index.php" method="POST">
    <p>Nike 80$
    <input type="checkbox" name="Nike" value=80></p><br>

    <p>Hogan 20$
    <input type="checkbox" name="Hogan" value=20></p><br>

    <p>Hai la carta fedeltà?
    <input type="checkbox" name="Sconto" value=-10></p><br>
    <input type="submit">
  </form>

  <?php
    if($_SERVER["REQUEST_METHOD"] == 'POST'){
      $Hogan = $_POST["Hogan"];
      $Nike = $_POST["Nike"];
      $Sconto =  $_POST["Sconto"];
      $Prezzo = 0;
      if(isset($_POST["Sconto"])){
        $Prezzo += $Sconto;
      }

      if(isset($_POST["Hogan"])){
        $Prezzo += $Hogan;
      }

      if(isset($_POST["Nike"])){
        $Prezzo += $Nike;
      }
      echo $Prezzo;
    }
  ?>

  </body>
</html>

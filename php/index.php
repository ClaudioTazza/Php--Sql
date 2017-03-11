<!--
Realizzare una applicazione che tramite la scelta dei prodotti e quantità dei prodotti mi generi la somma da pagare.
Sapendo che se la somma da pagare è superiore di 100 euro la spedizione è gratuita,
se si possiede una carta fedeltà c'è lo sconto del 10%.
La spedizione costa 10%, gli sconti si sovrappongono.
-->
<!doctype html>

<html>
  <head>
    <meta charset="utf-8">
    <title>Php</title>
  </head>

  <body>

  <h3>Warning</h3>
  <p>La spedizione si paga 50€.</p>
  <p>I possessori della carta federltà hanno diritto al 10% di sconto.</p>
  <p>Per acquisti superiori a 100€ la spedizione è gratuita.</p><br>

  <form action="index.php" method="POST">
    <p>Nike 80€
    <input type="checkbox" name="Nike" value=80>
    Quantità:
    <input type="number" name="NNike" min=0></p><br>

    <p>Hogan 20€
    <input type="checkbox" name="Hogan" value=20>
    Quantità:
    <input type="number" name="NHogan" min=0></p><br>

    <p>Hai la carta fedeltà?
    <input type="checkbox" name="Sconto" value=10></p><br>
    <input type="submit">
  </form>

  <?php

    if($_SERVER["REQUEST_METHOD"] == 'POST'){
      $Hogan = $_POST["Hogan"];
      $NHogan = $_POST["NHogan"];

      $Nike = $_POST["Nike"];
      $NNike = $_POST["NNike"];

      $Sconto =  $_POST["Sconto"]/100;
      $Prezzo = 0;

      if(isset($_POST["Hogan"])){
        $PHogan = $Hogan * $NHogan;
        echo "<h5>Hogan ". $PHogan. "€</h5>";
        $Prezzo += $PHogan;

      }//Se selezionato hogan viene aggiunto il prezzo delle Hogan a quello finale
      if(isset($_POST["Nike"])){
        $PNike = $Nike * $NNike;
        echo "<h5>Nike ". $PNike. "€</h5>";
        $Prezzo += $PNike;
      }//Se selezionato hogan viene aggiunto il prezzo delle Nike a quello finale

      if($Prezzo < 100){
        echo "<h5>Spedizione 50 €</h5>";
        $Prezzo += 50;
      }

      if(isset($_POST["Sconto"])){
        echo "<h5>Sconto -10%</h5>";
        $Prezzo -= $Prezzo * $Sconto;
      }//Se selezionato sconto diminuisce il prezzo finale


      echo "Prezzo finale:  ". $Prezzo. "€";
    }
  ?>

  </body>
</html>

<!doctype html>

<html>
  <head>
    <meta charset="utf-8">
    <title>Php</title>
  </head>

  <body>

  <?php
    $link = mysqli_init();  //Creiamo la variabile Link con la funzione mysqli_init
    mysqli_real_connect($link, '172.17.0.3', 'root', 'toor', 'tabelle');
    //                    VAR     IP         USER     PASS   NOMEDATABASE
  ?>

  <form action="index.php" method="POST">
    <p>Nome pizza:</p>
    <input type="text" name="Nome" placeholder="Nome Pizza"><br>

    <p>Prezzo:</p>
    <input type="text" name="Prezzo" placeholder="Prezzo (in centesimi)"><br>

    <input type="submit">
  </form>
  <!-- Questo form invia il nome della pizza e il suo prezzo -->

  <?php
    if($_SERVER["REQUEST_METHOD"] == 'POST'){
      if(isset($_POST["ID"])){
        $ID = $_POST["ID"];
        $query = "DELETE FROM pizze WHERE IDPizza=$ID";
        $stmt = mysqli_prepare($link, $query);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
      }
      else{
        $Nome = $_POST["Nome"];
        $Prezzo = $_POST["Prezzo"];
        $query = "INSERT INTO pizze (Nome, Prezzo) VALUES ('$Nome', '$Prezzo')";
        $stmt = mysqli_prepare($link, $query);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
      }
    }

    $query = "SELECT * FROM pizze";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_execute($stmt); #Esegue la query
    mysqli_stmt_bind_result($stmt, $IDPizza, $Nome, $Prezzo);
    #Diciamo quali sono gli attributi delle pizze

    echo "<table>";
    while (mysqli_stmt_fetch($stmt))
    {#ciclo che viene eseguito per ogni elemento trovato dalla query
      echo "<tr>";
      echo "<td>$Nome</td><td>$Prezzo</td>";

    ?>
      <td>
      <form action="index.php" method="POST">
        <input type="hidden" name="ID" value="<?php echo $IDPizza; ?>">
        <input type="submit" value="&times;">
      </form>
      </td>
    <?php

      echo "</tr>";
    }
    echo "</table>";
    mysqli_stmt_close($stmt);
   ?>
  </body>
</html>

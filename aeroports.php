<?php

function getConnection() {
  $db = "avions";
  $host = "localhost";
  $user = "root";
  $password = "";
  return new PDO("mysql:dbname=$db;host=$host", $user, $password);
}

// Partie modèle
function getAeroports() {
  // Se connecter à la base
  $connection = getConnection();
  //assert ($connection != null);
  // Ecrire la requete sql
  $sql = "
    SELECT id_aeroport, a.nom, v.nom AS ville
    FROM
      aeroport a
        INNER JOIN
      ville v ON a.id_ville = v.id_ville";
  // Recuperer les lignes
  return $connection->query($sql);
}
?>

<table border="1">
  <tr>
    <th>Code</th>
    <th>Nom</th>
    <th>Ville</th>
  </tr>
  <?php
  $rows = getAeroports();
  foreach ($rows as $row) {
    ?>
  <tr>
    <td><?= $row["id_aeroport"]?></td>
    <td><?= $row["nom"]?></td>
    <td><?= $row["ville"]?></td>
  </tr>
    <?php
  }
  ?>
</table>
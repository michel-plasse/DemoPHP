<?php
// Récupérer le modèle
include_once "modele/modeleAeroports.php";

/** Controleur */
try {
  $rows = getAeroports();
?>
  <table border="1">
    <tr>
      <th>Code</th>
      <th>Nom</th>
      <th>Ville</th>
      <th>Vols prévus</th>
    </tr>
    <?php
    foreach ($rows as $row) {
      ?>
    <tr>
      <td><?= $row["id_aeroport"]?></td>
      <td><?= $row["nom"]?></td>
      <td><?= $row["ville"]?></td>
      <td>
        <a href="vols-<?= $row["id_aeroport"]?>">Vols</a>
      </td>
    </tr>
      <?php
    }
    ?>
  </table>
  <?php
}
catch (PDOException $err) {
  error_log($err->getMessage());
  $now = date("d/m/Y H:i:s");
  echo "Problème avec la base de données à $now";
}

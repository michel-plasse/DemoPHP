<?php
// Récupérer le modèle
include_once "modele/modeleVols.php";

/** Controleur */
try {
  $idAeroport = "CDG";
  $rows = getVols($idAeroport);
  ?>
  <table border="1">
    <tr>
      <th>Départ</th>
      <th>Vers</th>
      <th>Arrivée</th>
    </tr>
    <?php
    foreach ($rows as $row) {
      ?>
      <tr>
        <td><?= $row["date_depart"] ?></td>
        <td>
          <?= $row["ville_arrivee"] ?>
          (<?= $row["aeroport_arrivee"] ?>)
        </td>
        <td><?= $row["date_arrivee"] ?></td>
      </tr>
      <?php
    }
    ?>
  </table>
  <?php
} catch (PDOException $err) {
  error_log($err->getMessage());
  $now = date("d/m/Y H:i:s");
  echo "Problème avec la base de données à $now";
}

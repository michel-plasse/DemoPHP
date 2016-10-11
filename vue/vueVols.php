<?php

function afficher_vols($idAeroport, $rows) {
  // Les afficher (vue)
  ?>
  <h1>Vols au départ de <?= $idAeroport ?></h1>
  <?php
  if (count($rows) == 0) {
    echo "<p>Aucun vol trouvé</p>";
  } else {
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
  }
}
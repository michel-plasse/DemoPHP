<?php
// Récupérer le modèle
include_once "modele/modeleVols.php";

/** Controleur */
try {
  // Recuperer le parametre idAeroport
  $idAeroport = filter_input(INPUT_GET, "idAeroport");
  if ($idAeroport == NULL) {
    die("L'aéroport de départ (idAeroport) doit être spécifié");
  }
  // Demander au modele les vols correspondants
  $rows = getVols($idAeroport);
  // Recupérer la vue
  include_once "vue/vueVols.php";
  // L'afficher
  afficher_vols($idAeroport, $rows);
} catch (PDOException $err) {
  error_log($err->getMessage());
  $now = date("d/m/Y H:i:s");
  echo "Problème avec la base de données à $now";
}


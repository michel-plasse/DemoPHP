<?php

include_once "DB.php";

/** Partie modèle. Renvoie un tableau de lignes */
function getVols($idAeroport) {
// Se connecter à la base
$connexion = getConnection();
// Ecrire la requete sql
$stmt = $connexion->prepare("
  SELECT
    date_depart, vi.nom AS ville_arrivee,
    a.nom AS aeroport_arrivee, date_arrivee
  FROM
    vol v
      INNER JOIN
    aeroport a ON v.id_aeroport_arrivee = a.id_aeroport
      INNER JOIN
    ville vi ON a.id_ville = vi.id_ville
  WHERE id_aeroport_depart = '$idAeroport'");
  // Executer la requete
  $stmt->execute();
  // Renvoyer les lignes
  return $stmt->fetchAll();
}

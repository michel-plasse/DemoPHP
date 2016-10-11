<?php

include_once "DB.php";

/** Partie modèle. Renvoie un tableau de lignes */
function getVols($idAeroport) {
// Se connecter à la base
$connexion = getConnection();
// Ecrire la requete sql
$stmt = $connexion->prepare("
  SELECT
    date_depart, va.nom AS ville_arrivee,
    aa.nom AS aeroport_arrivee, date_arrivee
  FROM
    vol v
      INNER JOIN
    aeroport aa ON v.id_aeroport_arrivee = aa.id_aeroport
      INNER JOIN
    ville va ON aa.id_ville = va.id_ville
  WHERE id_aeroport_depart = '$idAeroport'");
  // Executer la requete
  $stmt->execute();
  // Renvoyer les lignes
  return $stmt->fetchAll();
}

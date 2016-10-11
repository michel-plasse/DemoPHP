<?php
include_once "DB.php";

/** Partie modèle. Renvoie un tableau de lignes */
function getAeroports() {
  // Se connecter à la base
  $connexion = getConnection();
  //assert ($connection != null);
  // Ecrire la requete sql
  $stmt = $connexion->prepare("
    SELECT id_aeroport, a.nom, v.nom AS ville
    FROM
      aeroport a
        INNER JOIN
      ville v ON a.id_ville = v.id_ville");
  // Executer la requete
  $stmt->execute();
  // Renvoyer les lignes
  return $stmt->fetchAll();
}

@extends('frontend.layouts.master')
@section('head')
	<style type="text/css">
	.dataTables_filter{
		display: none;
		}
	</style>
@endsection
@section('content')
<div class="col-xl-12">
<?php
// On indique au navigateur qu'on utilise l'encodage UTF-8
header('Content-type: text/html; charset=utf-8');
 
// Paramètres de connexion à la base
define('DB_HOST' , '127.0.0.1');
define('DB_NAME' , 'algeriainvest_v1');
define('DB_USER' , 'algeriainvest_v1');
define('DB_PASS' , 'Toe7huTp2n_ty2Xs');
 
// Connexion à la base avec PDO
try{
    $pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch(Exception $e) {
    echo "Impossible de se connecter à la base de données '".DB_NAME."' sur ".DB_HOST." avec le compte utilisateur '".DB_USER."'";
    echo "<br/>Erreur PDO : <i>".$e->getMessage()."</i>";
    die();
}





     
    // On prépare les données à insérer
    $ip   = $_SERVER['REMOTE_ADDR']; // L'adresse IP du visiteur
    $date = date('Y-m-d');           // La date d'aujourd'hui, sous la forme AAAA-MM-JJ

    // Mise à jour de la base de données
    // 1. On initialise la requête préparée

    $query = $pdo->prepare("
        INSERT INTO stats_visites (ip , date_visite , pages_vues) VALUES (:ip , :date , 1)
        ON DUPLICATE KEY UPDATE pages_vues = pages_vues + 1
    ");
    // 2. On execute la requête préparée avec nos paramètres
    $visit = $query->execute(array(
        ':ip'   => $ip,
        ':date' => $date
    ));
	echo $visit;

	
	



?>


</div>
@endsection
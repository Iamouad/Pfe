

<?php

$servername = $_SERVER['SERVER_NAME']	;
if( $servername == "localhost" || $servername == "127.0.0.1"  ) {



$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'pfe2';
$site = 'localhost';


}
else {



$host = 'localhost';
$user = 'root';

$pass = 'databasePass/';
$db = 'pfe';
$site = 'http://fcensas.com/pfe';

}

$universite = 'Université Cadi Ayyad';
$ecole = 'ENSA Safi';
$dep_label = 'Département Informatique, Réseaux et Télécommunications' ;
$table_pfe = 'ensas_pfe';
$table_profs = 'ensas_pfe_profs' ;
$table_admin = 'admin';
$titre = 'Gestion des PFE' ;
//$bg_color = '#D8B8AD' ;
$bg_color = '#E6E6E6' ;
$copyright = 'ENSA SAFI (C) '.date('Y');



// $con = new mysqli($host,$user,$pass,$db);
$con = new PDO('mysql:host=localhost;dbname=' . $db, $user, $pass);
//$con = mysql_connect($host,$user,$pass) or die(mysql_error());
//$db = mysql_select_db($db,$con);


$headers = "MIME-Version: 1.0\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\n";
$headers .= "From: ENSAS - IRT <walid.bouarifi@gmail.com>\n";

/*$headers  = "From: testsite < mail@testsite.com >\n";
$headers .= "Cc: testsite < w.bouarifi@uca.ac.ma >\n"; 
    $headers .= "X-Sender: testsite < w.bouarifi@uca.ac.ma>\n";*/
    $headers .= 'X-Mailer: PHP/' . phpversion();
    $headers .= "X-Priority: 1\n"; // Urgent message!
    $headers .= "Return-Path: w.bouarifi@uca.ac.ma\n"; // Return path for errors
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=iso-8859-1\n";

    $headers .= 'X-Mailer: PHP/' . phpversion();



$datelimins  = mktime(0,0,0,3,3,2020); //(M,J,A) date limite de préinscription
$datelimedit = mktime(0,0,0,5,30,2020); //date limite de compléter les données
$datefinale = mktime(0,0,0,7,30,2020); //4jours apres les soutenances




if (!function_exists('protect')) {
 
function protect($string)
{
 //$string = mysql_real_escape_string($string);
 return $string;
}

}

$db = new PDO('mysql:host=localhost;dbname=pfe', 'root', '');



?>

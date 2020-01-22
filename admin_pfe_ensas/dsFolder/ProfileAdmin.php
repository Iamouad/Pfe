<?php
session_start();
if(!isset($_SESSION['user']))
    header('location:../index.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <div id = "division" class="container p-3 bg-dark text-white">
        <div class="d-flex m-3 justify-content-center">
            <button type="button" onclick="location.href ='Jury.php'" class="btn-lg btn-info m-4">Jury</button>
            <button type="button"  onclick="location.href ='listePfe.php'" class="btn-lg btn-primary m-4">liste des PFEs</button>
            <button type="button" onclick="location.href ='salle.php'" class="btn-lg btn-warning m-4">Salles et jurys</button>
            <button type="button" onclick="location.href ='deconnexion.php'" class="btn-lg btn-danger m-4">Déconnexion</button>

        </div>
    </div>
</body>
</html>
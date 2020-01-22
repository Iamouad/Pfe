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
    <meta http-equiv="X-UA-Compatible" content="ie=edge">*
    <link rel="stylesheet" href="bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<div id = "division" class="container p-3 bg-dark text-white">
    <h1 class="text-center">Formulaire de dates et locaux de soutenances</h1>
    <form action="validerDate.php" method="post">
    <?php
       require 'DataBaseManager.php';
       $db = new DataBaseManager();
       $query = $db->getEncadrants();
        while ($data = $query->fetch()) {
        $nomEnc = $data['nomEnc'];
            ?>

        <h2 class="text-center text-warning">Encadrant: <?php echo $nomEnc; ?></h2>
            <div class="d-flex justify-content-center">
        <table class="table-bordered m-4 ">
            <thead>
            <td>Nom</td>
            <td>Prennom</td>
            <td>Filiere</td>
            <td>Date soutenance</td>
            <td>Heure</td>
            <td>Local</td>
            </thead>
            <tbody>
            <?php

            $query2 = $db->getStudents($nomEnc);
            while ($data2 = $query2->fetch()) {

                ?>
                <tr class="p-2">
                    <td class="p-2"><?php echo $data2['nom1']; ?></td>
                    <td class="p-2"><?php echo $data2['prenom1']; ?></td>
                    <td class="p-2"><?php echo $data2['filiere']; ?></td>

                    <td><input type="date" name=<?php echo 'date'.$data2['id']; ?>  placeholder = "yyyy-mm-d"></td>
                    <td><input type="time" name=<?php echo 'horaire'.$data2['id']; ?> placeholder = "hh-mm-ss"></td>
                    <td><input type="text" name=<?php echo 'local'.$data2['id']; ?> placeholder = "local"></td>
                </tr>
                <?php

            }
            ?>
            </tbody>
            </table>
            </div>
            <?php
        }

       ?>
        <div class="d-flex justify-content-center">

        <button type="submit" class="btn-lg btn-primary m-4">Valider</button>
        </div>
        </form>

    </div>

    <?php
       
    ?>
</body>
</html>
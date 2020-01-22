<?php
session_start();

require ('DataBaseManager.php');
$db = new DataBaseManager();
$nom = $_SESSION['nom'];
$query = $db->getStudents($nom);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="ISO-8859-1">
    <title>Inscription</title>
    <link rel="stylesheet" href="bootstrap.min.css"/>
</head>
<body>
<div class="container m-5 bg-dark text-white">
    <h1 class="text-center m-5">Bonjour Mr: <?php echo $nom;?></h1>
    <form method="post" action="print.php">
    <div class="d-flex justify-content-center">

        <table class="table-bordered m-4 ">
            <thead>
            <td>Année universitaire</td>
            <td>Nom et prenom</td>
            <td>Intitulé pfe</td>
            <td>Selection</td>
            </thead>
            <tbody>
            <?php
            while($data = $query->fetch()){

                $date = $data['date'];
                $token = strtok($date, "-");
                $anneeUniversitaire = $token;


                ?>
                <tr>
                    <td class="p-2"><?php echo $anneeUniversitaire; ?></td>
                    <td class="p-2"><?php echo $data['nom1'].' '. $data['prenom1']; ?></td>
                    <td class="p-2"><?php echo $data['sujet']; ?></td>
                    <td class="p-2"><?php echo $data['encadrant']; ?></td>

                    <td class="p-2"><input type="checkbox" name="<?php echo $data['nom1']; ?>"></td>

                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>

        <input type="hidden" value="<?php $nom;?>" name="nom">
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn-lg btn-primary" name="submit">Attestation</button>
        </div>
    </form>
</div>
</body>



</html>
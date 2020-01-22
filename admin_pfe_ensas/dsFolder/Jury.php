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
<div class="container p-3 bg-dark text-white text-center ">
<?php
    require 'DataBaseManager.php';
    $db = new DataBaseManager();
    $nbJury = $db->nbJury();
    for($i = 1; $i <= $nbJury; $i++){
        $query = $db->getJury($i);
?>
    <h1 >Jury numéro: <?php echo $i; ?></h1>
    <div class="d-flex justify-content-center">

    <table class="table-bordered m-4 ">
        <thead>
        <td>Membre Jury</td>
        <td>Email</td>
        <td>Spécialité</td>
        </thead>
        <tbody>
        <?php
         while($data = $query->fetch()){
             ?>
            <tr>
            <td><?php echo $data['nom'].' '. $data['prenom']; ?></td>
            <td><?php echo $data['email']; ?></td>
            <td><?php echo $data['specialite']; ?></td>
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
    
</div>
</body>
</html>
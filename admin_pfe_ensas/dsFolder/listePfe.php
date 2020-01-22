<?php
require 'DataBaseManager.php';
$db = new DataBaseManager();
$pfeInfo = $db->getPfe("F");
$pfeGtr = $db->getPfe("T");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="ISO-8859-1">
    <title>Inscription</title>
    <link rel="stylesheet" href="bootstrap.min.css"/>
    <script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }

    </script>
</head>
<body>
<div class="container m-5 bg-dark text-white" id="myFile">
    <h1 class="text-center m-5">Liste des pfes de la filiere G. info</h1>
    <div class="d-flex justify-content-center">

        <table class="table-bordered m-4 ">
            <thead>
            <td>Nom et prenom</td>
            <td>Intitulé pfe</td>
            <td>Encadrant</td>
            <td>Soutenance</td>
            <td>N° d'Ordre</td>
            <td>Observations</td>
            </thead>
            <tbody>
            <?php
            while($data = $pfeInfo->fetch()){

                $date = $data['date'];
                $token = strtok($date, "-");
                $numOrdre = $data['filiere'].' '.$data['groupe'].$token;
                $observation = $db->getObservation($data['encadrant']);

                ?>
                <tr>
                    <td><?php echo $data['nom1'].' '. $data['prenom1']; ?></td>
                    <td><?php echo $data['sujet']; ?></td>
                    <td><?php echo $data['encadrant']; ?></td>
                    <td><?php echo $data['date']; ?></td>
                    <td><?php echo $numOrdre; ?></td>
                    <td><?php echo $observation; ?></td>

                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>

    <h1 class="text-center m-5">Liste des pfes de la filiere GTR</h1>
    <div class="d-flex justify-content-center">

        <table class="table-bordered m-4 ">
            <thead>
            <td>Nom et prenom</td>
            <td>Intitulé pfe</td>
            <td>Encadrant</td>
            <td>Soutenance</td>
            <td>N° d'Ordre</td>
            <td>Observations</td>

            </thead>
            <tbody>
            <?php
            while($data = $pfeGtr->fetch()){

                $date = $data['date'];
                $token = strtok($date, "-");
                $numOrdre = $data['filiere'].' '.$data['groupe'].$token;
                $observation = $db->getObservation($data['encadrant']);


                ?>
                <tr>
                    <td><?php echo $data['nom1'].' '. $data['prenom1']; ?></td>
                    <td><?php echo $data['sujet']; ?></td>
                    <td><?php echo $data['encadrant']; ?></td>
                    <td><?php echo $data['date']; ?></td>
                    <td><?php echo $numOrdre; ?></td>
                    <td><?php echo $observation; ?></td>

                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>

    </div>

<div class="d-flex justify-content-center ">
    <button class="btn-lg btn-primary m-5" onclick="printDiv('myFile')">Imprimer le document</button>
</div>
</body>

</html>
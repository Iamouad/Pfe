<?php
    require('DataBaseManager.php');
    $manager = new DataBaseManager();
    $query = $manager->getStudent();
    while ($student = $query->fetch()){
        $date = 'date'.$student['id'];
        $time = 'horaire'.$student['id'];
        $local = 'local'.$student['id'];
        if(isset($_POST[$date]) && isset($_POST[$time]) && isset($_POST[$local])){
        $manager->updateStudent($student['id'], $_POST[$date], $_POST[$time], $_POST[$local]);
        }
    }

    header('location:salle.php');

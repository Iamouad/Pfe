<?php
class DataBaseManager  
{
    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost; dbname=pfe2', 'root', '');
    }

    public function nbJury()
    {
        $query = $this->db->prepare('Select Max(jury) as nbJury from ensas_pfe_profs');
        $query->execute();
        $data = $query->fetch();
        return $data['nbJury'];
    }

    public function getJury($jury)
    {
        $query = $this->db->prepare('Select * from ensas_pfe_profs where jury = ?');
        $query->execute(array($jury));
        return $query;
    }

    public function getStudents($nomEncadrant){
        $query = $this->db->prepare('Select * from ensas_pfe where encadrant = ? order by date');
        $query->execute(array($nomEncadrant));
        return $query;
    }

    public function getStudent(){
        $query = $this->db->prepare('Select * from ensas_pfe');
        $query->execute();
        return $query;
    }

    public function getEncadrants()
    {
        $query = $this->db->prepare('Select distinct encadrant as nomEnc from ensas_pfe order by encadrant');
        $query->execute();
        return $query;
    }

    public function updateStudent($id, $date, $heure, $local)
    {
        if(!empty($date)){
            $query = $this->db->prepare('Update ensas_pfe set date = ? where id = ?');
            $query->execute(array($date, $id));
        }
        if(!empty($heure)){
            $query = $this->db->prepare('Update ensas_pfe set heure = ? where id = ?');
            $query->execute(array($heure, $id));
        }
        if(!empty($local)){
            $query = $this->db->prepare('Update ensas_pfe set local = ? where id = ?');
            $query->execute(array($local, $id));
        }

        return;
    }

    public function getPfe($filiere){
        $query = $this->db->prepare('Select * from ensas_pfe where filiere = ?');
        $query->execute(array($filiere));
        return $query;
    }

    public function getObservation($encadrant){
        $query = $this->db->prepare('Select observations as ob from ensas_pfe_profs where nom = ? limit 1');
        $query->execute(array($encadrant));
        $data = $query->fetch();
        return $data['ob'];
    }

    public function checkProf($login, $pass){
        $query = $this->db->prepare('Select * from ensas_pfe_profs where login = ? and passe = ? limit 1');
        $query->execute(array($login, $pass));
        return $query;
    }


    
}



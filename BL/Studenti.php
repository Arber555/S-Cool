<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Studenti
 *
 * @author Arber
 */
class Studenti extends Personi{
    
    private $kryetar;
    
    public function __construct($e, $m, $uN, $p, $nrP, $gj, $k)
    {
        Personi::__construct($e, $m, $uN, $p, $nrP, $gj);
        $this->kryetar = $k;
    }
    
    function getKryetar() {
        return $this->kryetar;
    }

    function setKryetar($kryetar) {
        $this->kryetar = $kryetar;
    }

    public function insert(Studenti $s){
        $stmt = $con->prepare("INSERT INTO Studenti(Grupi)");
        //+s.getEmri()+","+s.getMbiemri()+","+s.getUserName()+","+s.getPassword()+","+s.getNrPersonal()+","+s.getGjinia()+"
    }
    
    /*
    $stmt = $con->prepare("INSERT INTO Perdorues (Username, Emri, Mbiemri, Passwordi) values (?,?,?,?)");
	
	$stmt->bind_param("ssss", $_POST['user'],$_POST['emri'], $_POST['mbiemri'], $_POST['fjalkalimi']);
	
	if(isset($_POST['logBtn']))
	{
		$stmt->execute();
		$stmt->close();
		$con->close();
		header("Location: http://localhost:8080/projekti/Raycross.php");
	}
     */
}

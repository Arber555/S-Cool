<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of About
 *
 * @author Arber
 */
class About {
    
    private $dataLindjes;
    private $vendiLindjes;
    private $nrTel;
    private $email;
    private $adresa;
    private $vendBanimi;
    private $relationship;
    private $detaje;
   
    public function __construct($dL, $vL, $nTel, $e, $a, $vB, $r, $d)
    {
        $this->dataLindjes = $dL;
        $this->vendiLindjes = $vL;
        $this->nrTel = $nTel;
        $this->email = $e;
        $this->adresa = $a;
        $this->vendBanimi = $vB;
        $this->relationship = $r;
        $this->detaje = $d;
    }
    
    function getDataLindjes() {
        return $this->dataLindjes;
    }

    function getVendiLindjes() {
        return $this->vendiLindjes;
    }

    function getNrTel() {
        return $this->nrTel;
    }

    function getEmail() {
        return $this->email;
    }

    function getAdresa() {
        return $this->adresa;
    }

    function getVendBanimi() {
        return $this->vendBanimi;
    }

    function getRelationship() {
        return $this->relationship;
    }

    function getDetaje() {
        return $this->detaje;
    }

    function setDataLindjes($dataLindjes) {
        $this->dataLindjes = $dataLindjes;
    }

    function setVendiLindjes($vendiLindjes) {
        $this->vendiLindjes = $vendiLindjes;
    }

    function setNrTel($nrTel) {
        $this->nrTel = $nrTel;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setAdresa($adresa) {
        $this->adresa = $adresa;
    }

    function setVendBanimi($vendBanimi) {
        $this->vendBanimi = $vendBanimi;
    }

    function setRelationship($relationship) {
        $this->relationship = $relationship;
    }

    function setDetaje($detaje) {
        $this->detaje = $detaje;
    }
    
    public function insertS(About $a, $idS){
        
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        if($a->relationship === ""){
            $a->relationship = null;}
        else if($a->detaje === ""){   
            $a->detaje = null;
        }
        
        $stmt = $con->prepare("INSERT INTO About(Data_Lindjes, Vendi_Lindjes, Nr_Tel, email, adresa, vendBanimi, Relationship, Detaje, fk_Studenti) values (?,?,?,?,?,?,?,?,?);");
        //23-5-2016
        $dataL = date("Y-m-d", strtotime($a->dataLindjes));
        $stmt->bind_param("ssisssssi", $dataL, $a->vendiLindjes, $a->nrTel, $a->email, $a->adresa, $a->vendBanimi, $a->relationship, $a->detaje, $idS);
        
        if($stmt->execute())
        {
            $stmt->close();
            return true;
        }
        else
        {
            echo "Error insert record: " . $con->error;
        }
        return false;
    }
    
    public function insertP(About $a, $idP){
        
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        
        if($a->relationship === ""){
            $a->relationship = null;}
        else if($a->detaje === ""){   
            $a->detaje = null;
        }
        
        $stmt = $con->prepare("INSERT INTO About(Data_Lindjes, Vendi_Lindjes, Nr_Tel, email, adresa, vendBanimi, Relationship, Detaje, fk_Profesori) values (?,?,?,?,?,?,?,?,?);");
        //23-5-2016
        $dataL = date("Y-m-d", strtotime($a->dataLindjes));
        $stmt->bind_param("ssisssssi", $dataL, $a->vendiLindjes, $a->nrTel, $a->email, $a->adresa, $a->vendBanimi, $a->relationship, $a->detaje, $idP);
        
        if($stmt->execute())
        {
            $stmt->close();
            return true;
        }
        else
        {
            echo "Error insert record: " . $con->error;
        }
        return false;
    }
    
    
    
    public function update($id, $dL, $vL, $nTel, $e, $a, $vB, $r, $d)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
       
        $sql = "UPDATE About SET Data_Lindjes='".$dL."', Vendi_Lindjes='".$vL."', Nr_Tel='".$nTel."', email='".$e."', adresa='".$a."', vendBanimi='".$vB."', Relationship='".$r."', Detaje='".$d."' WHERE ID=".$id."";
        
        if($con->query($sql) === TRUE) 
        {
            return true;
        } 
        else {
            return false;
            //echo "Error updating record: " . $conn->error;
        }
    }
    
    public function delete($id)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        
        $sql = "DELETE FROM About WHERE id=".$id."";
        
        if($con->query($sql) === true) 
        {
            return true;
        } 
        else 
        {
            return false;
            //echo "Error deleting record: " . $conn->error;
        }
    }
    
    public function getIdFromP($fk_Profit)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        
        $sql = "Select * from About where fk_Profesori=".$fk_Profit."";
        
        $result = mysqli_query($con, $sql) or die(mysqli_error($con));
        
        if(mysqli_num_rows($result) > 0)
        {
            $row = mysqli_fetch_assoc($result);
            if(isset($row))
            {
                return $row['ID'];
            }
        }
        else
        {
            return "No results found.";
        }
    }
    
    public function getIdFromS($fk_Studenti)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        
        $sql = "Select * from About where fk_Studenti=".$fk_Studenti."";
        
        $result = mysqli_query($con, $sql) or die(mysqli_error($con));
        
        if(mysqli_num_rows($result) > 0)
        {
            $row = mysqli_fetch_assoc($result);
            if(isset($row))
            {
                return $row['ID'];
            }
        }
        else
        {
            return "No results found.";
        }
    }
}

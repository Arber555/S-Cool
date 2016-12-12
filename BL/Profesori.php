<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Rofesori
 *
 * @author Arber
 */
class Profesori {
    
    private $emri;
    private $mbiemri;
    private $userName;
    private $password;
    private $nrPersonal;
    private $gjinia;
    private $salt = "AmEl9596";
    
    public function __construct($e, $m, $uN, $p, $nrP, $gj)
    {
        $this->emri = $e;
        $this->mbiemri = $m;
        $this->userName = $uN;
        $this->password = $p;
        $this->nrPersonal = $nrP;
        $this->gjinia = $gj;
    }
    
    function getEmri() {
        return $this->emri;
    }

    function getMbiemri() {
        return $this->mbiemri;
    }

    function getUserName() {
        return $this->userName;
    }

    function getPassword() {
        return $this->password;
    }

    function getNrPersonal() {
        return $this->nrPersonal;
    }

    function getGjinia() {
        return $this->gjinia;
    }

    function getSalt() {
        return $this->salt;
    }

    function setEmri($emri) {
        $this->emri = $emri;
    }

    function setMbiemri($mbiemri) {
        $this->mbiemri = $mbiemri;
    }

    function setUserName($userName) {
        $this->userName = $userName;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setNrPersonal($nrPersonal) {
        $this->nrPersonal = $nrPersonal;
    }

    function setGjinia($gjinia) {
        $this->gjinia = $gjinia;
    }

    function setSalt($salt) {
        $this->salt = $salt;
    }

     public function insert(Profesori $s){
        
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        $stmt = $con->prepare("INSERT INTO Profesori(Emri, Mbiemri, UserName, Password, Nr_Personal, Gjinia) values (?,?,?,?,?,?)");
        $hash = crypt($s->password, $this->salt);
        $stmt->bind_param("ssssis", $s->emri, $s->mbiemri, $s->userName, $hash, $s->nrPersonal, $s->gjinia);
        
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
    
    public function update($id, $e, $m, $uN, $nrP, $gj)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
       
        $sql = "UPDATE Profesori SET Emri='".$e."', Mbiemri='".$m."', UserName='".$uN."', Nr_Personal='".$nrP."', Gjinia='".$gj."' WHERE ID=".$id."";
        
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
        
        $sql = "DELETE FROM Profesori WHERE id=".$id."";
        
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
    
    public function selectAll()
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        
        $sql = "SELECT * FROM Profesori";
        
        $result = mysqli_query($con, $sql);
        
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                
                echo "<tr onclick='indeksiReshtit(this)'><td>".$row['ID']."</td>"
                        . "<td>".$row['Emri']."</td>"
                        . "<td>".$row['Mbiemri']."</td>"
                        . "<td>".$row['UserName']."</td>"
                        . "<td>".$row['Nr_personal']."</td>"
                        . "<td>".$row['Gjinia']."</td>";
            }
        }
    }
    
    public function returnPassword($un)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        
        $sql = "SELECT Password FROM Profesori WHERE UserName = '$un'";
        
        if(($temp = $con->query($sql)) === true)
        {
            return $temp;
        }
        else
        {
            return "Error";
        }
    }
    
    public static function returnID($userName)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        
        $sql = "SELECT ID FROM Profesori WHERE UserName = '".$userName."'";
        
        $result = mysqli_query($con, $sql);
        
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
    
    public static function returnProfesorin($userName)
    {
        $id = Profesori::returnID($userName);

        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        
        $sql = "Select * from Profesori p, About a where p.ID =".$id." && ".$id."= a.fk_Profesori";
        
        $result = mysqli_query($con, $sql) or die(mysqli_error($con));
        
        if(mysqli_num_rows($result) > 0)
        {
            $row = mysqli_fetch_assoc($result);
            if(isset($row))
            {
                return $row;
            }
        }
        else
        {
            return "No results found.";
        }
    }
}

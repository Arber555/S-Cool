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
class Studenti{
    
    private $emri;
    private $mbiemri;
    private $userName;
    private $password;
    private $nrPersonal;
    private $gjinia;
    private $salt = "AmEl9596";
    private $kryetar;
    
    public function __construct($e, $m, $uN, $p, $nrP, $gj, $k)
    {
        $this->emri = $e;
        $this->mbiemri = $m;
        $this->userName = $uN;
        $this->password = $p;
        $this->nrPersonal = $nrP;
        $this->gjinia = $gj;
        
        $this->kryetar = $k;
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
    function getKryetar() {
        return $this->kryetar;
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
    
    function setKryetar($kryetar) {
        $this->kryetar = $kryetar;
    }
    
    public function insert(Studenti $s){
        
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        $stmt = $con->prepare("INSERT INTO Studenti(Kryetar, Emri, Mbiemri, UserName, Password, Nr_Personal, Gjinia) values (?,?,?,?,?,?,?)");
        $hash = crypt($s->password, $this->salt);
        $k = !isset($s->kryetar)?  0 :  1;
        $stmt->bind_param("issssis",$k, $s->emri, $s->mbiemri, $s->userName, $hash, $s->nrPersonal, $s->gjinia);
        
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
    
    public function update($id, $e, $m, $uN, $nrP, $gj, $k)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        
        /*$hash = returnPassword($uN);
        $sql = null;
        
        if(password_verify($p, $hash)){
            echo "boni";
            $sql = "UPDATE Studenti SET Emri='".$e."', Mbiemri='".$m."', UserName='".$uN."', Password='".$hash."', Nr_Personal='".$nrP."', Gjinia='".$gj."', Kryetar='".$k."' WHERE ID=".$id."";
        }
        else{
            echo "nuk o ka bon";
            $hash1 = crypt($p, $this->salt);
            $sql = "UPDATE Studenti SET Emri='".$e."', Mbiemri='".$m."', UserName='".$uN."', Password='".$hash1."', Nr_Personal='".$nrP."', Gjinia='".$gj."', Kryetar='".$k."' WHERE ID=".$id."";
        }*/
       
        $sql = "UPDATE Studenti SET Emri='".$e."', Mbiemri='".$m."', UserName='".$uN."', Nr_Personal='".$nrP."', Gjinia='".$gj."', Kryetar='".$k."' WHERE ID=".$id."";
        
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
        
        $sql = "DELETE FROM Studenti WHERE id=".$id."";
        
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
        
        $sql = "SELECT * FROM Studenti";
        
        $result = mysqli_query($con, $sql);
        
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                $temp = $row['Kryetar']==1?'Po':'Jo';
                echo "<tr onclick='indeksiReshtit(this)'><td>".$row['ID']."</td>"
                        . "<td>".$row['Emri']."</td>"
                        . "<td>".$row['Mbiemri']."</td>"
                        . "<td>".$row['UserName']."</td>"
                        . "<td>".$row['Nr_personal']."</td>"
                        . "<td>".$row['Gjinia']."</td>"
                        . "<td>".$temp."</td></tr>";
            }
        }
    }
    
    public function returnPassword($un)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        
        $sql = "SELECT Password FROM Studenti WHERE UserName = '.$un.'";
        
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
        
        $sql = "SELECT ID FROM Studenti WHERE UserName = '".$userName."'";
        
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
    
    public static function returnStudentin($userName)
    {
        $id = Studenti::returnID($userName);

        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        
        $sql = "SELECT * FROM Studenti as s INNER JOIN About as a ON s.ID = ".$id."";
        
        $result = mysqli_query($con, $sql);
        
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
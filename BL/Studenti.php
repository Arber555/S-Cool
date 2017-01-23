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
    private $salt = 'AmEl9596';
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
    
    public static function returnPassword($un)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        
        $sql = "SELECT Password FROM Studenti WHERE UserName = '".$un."'";
        
        /*if(($temp = $con->query($sql)) === true)
        {
            return $temp;
        }
        else
        {
            return "Error";
        }*/
        
        $result = mysqli_query($con, $sql);
        
        if(mysqli_num_rows($result) > 0)
        {
            $row = mysqli_fetch_assoc($result);
            if(isset($row))
            {
                return $row['Password'];
            }
        }
        else
        {
            return "No results found.";
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
        $sql = "Select * from Studenti as s, About as a where s.ID =".$id." and ".$id."=a.fk_Studenti";
        
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
    
    public static function returnStudentiKryetar($userName)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        
        $sql = "SELECT Kryetar FROM Studenti WHERE UserName = '".$userName."'";
        
        $result = mysqli_query($con, $sql);
        
        if(mysqli_num_rows($result) > 0)
        {
            $row = mysqli_fetch_assoc($result);
            if(isset($row))
            {
                return $row['Kryetar'];
            }
        }
        else
        {
            return "No results found.";
        }
    }
    
    public function updateMeAbout($id, $kryetar, $e, $m, $uN, $gj, $VL, $DL, $em, $VB, $r, $nTel, $a, $d)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        
        $ab = new About($DL, $VL, $nTel, $em, $a, $VB, $r, $d);
        $idAbout = $ab->getIdFromS($id);
        $temp = $ab->update($idAbout, $DL, $VL, $nTel, $em, $a, $VB, $r, $d);
        
        $sql = "UPDATE Studenti SET Kryetar='".$kryetar."', Emri='".$e."', Mbiemri='".$m."', UserName='".$uN."',Gjinia='".$gj."' WHERE ID=".$id."";
        
        if($con->query($sql) === TRUE && isset($temp)) 
        {
            return true;
        } 
        else 
        {
            return false;
            //echo "Error updating record: " . $conn->error;
        }
    }
    
    public static function findByEmriAndMbiemri($fjala)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        $sql = null;
        
        if(isset($fjala) && strpos($fjala, ' ')){
            list($emri, $mbiemri) = explode(' ', $fjala);
            $sql = "SELECT * FROM Studenti WHERE Emri = '".$emri."' and Mbiemri = '".$mbiemri."'";
        }
        else if(isset($fjala)){
            $sql = "SELECT * FROM Studenti WHERE Emri = '".$fjala."'";
        }
        
        $njerzt = array();
        $count = 0;
        $result = mysqli_query($con, $sql);
        
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                /*echo "<tr>"
                        //."<td>".$row['ID']." </td>"
                        ."<td>".$row['Emri']." </td>"
                        ."<td>".$row['Mbiemri']."</td>"
                    ."</tr>";*/
                $njerzt[$count++] = $row;
            }
        }
        //else
        //{
            //return "No results found.";
        //}
        
        return $njerzt;
    }
        
    public static function shtoStudentNeGrup($id, $idStudentit)
    {
        //$idGrupit = Grupi::returnID($emriGrupit);
        
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        
        $sql = "UPDATE studenti SET FK_Grupi =".$id." where ID = ".$idStudentit."";
        
        if($con->query($sql) === TRUE) 
        {
            return true;
        } 
        else 
        {
            return false;
            //echo "Error updating record: " . $conn->error;
        }
    }
    
    public static function fshijStudentNgaGrup($idStudentit)
    {        
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        
        $sql = "UPDATE studenti SET FK_Grupi = null where ID = ".$idStudentit."";
        
        if($con->query($sql) === TRUE) 
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }
    
    public static function selectAllStudentsForGroupR($id)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        
        $sql = "Select s.ID,s.Emri,s.Mbiemri,d.Emri_Drejtimit, a.email from studenti s, drejtimi d, about a where s.fk_Drejtimi = d.ID and s.ID = a.fk_Studenti and s.FK_Grupi =".$id;
        //fk_grupi = 13 osht e duhet me ndreq me grup taman me bo qysh duhet jo veq per 13
        $result = mysqli_query($con, $sql);
        
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                echo "<tr onclick='indeksiReshtit1(this)'>"
                        //. "<td><img alt='foto'></td>"
                        . "<td>".$row['ID']."</td>"
                        . "<td>".$row['Emri']."</td>"
                        . "<td>".$row['Mbiemri']."</td>"
                        . "<td>".$row['Emri_Drejtimit']."</td>"
                        . "<td>".$row['email']."</td></tr>";
                        //. "<td><button name='remove' class='btn btn-danger'>Remove</button></td></tr>";
            }
        }
    }
    
    public static function selectAllStudentsForGroupA()
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        
        $sql = "Select s.ID,s.Emri,s.Mbiemri,d.Emri_Drejtimit, a.email from studenti s, drejtimi d, about a where s.fk_Drejtimi = d.ID and s.ID = a.fk_Studenti and s.FK_Grupi IS NULL ";
        
        $result = mysqli_query($con, $sql);
        
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                echo "<tr onclick='indeksiReshtit(this)'>"
                        //. "<td><img alt='foto'></td>"
                        . "<td>".$row['ID']."</td>"
                        . "<td>".$row['Emri']."</td>"
                        . "<td>".$row['Mbiemri']."</td>"
                        . "<td>".$row['Emri_Drejtimit']."</td>"
                        . "<td>".$row['email']."</td></tr>";
                        //. "<td><button name= 'add".$row['ID']."' class='btn btn-primary' onclick='reshtiTabele()'> Add</button></td></tr>";
            }
        }
    }
    
    public function getPostimin($userName)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        
        $idP = Studenti::returnID($userName);
        
        $sql = "SELECT * FROM Studenti as s INNER JOIN postimi as pos ON s.ID = ".$idP." AND pos.FK_Studenti = ".$idP." ORDER BY pos.ID DESC";
        
        $post = array();
        
        $result = mysqli_query($con, $sql);
        $count = 0;
        if(mysqli_num_rows($result) > 0)
        {
            
            while($row = mysqli_fetch_assoc($result))
            {
                $post[$count++] = $row;
            }
        }
        return $post;
    }   
    
    public static function getStudentiById($id)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        $sql = "Select * from Studenti as s  where s.ID =".$id."";
        
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

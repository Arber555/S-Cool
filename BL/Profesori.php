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
        
        $sql = "Select * from Profesori as p, About as a where p.ID =".$id." and ".$id."=a.fk_Profesori";
        
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
    
    /*public function returnAboutId($id)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        
        $sql = "SELECT a.fk_Profesori FROM Profesori p , Abut a WHERE a.fk_Profesori = ".$id."";
        
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
    }*/
    
    public function updateMeAbout($id, $e, $m, $uN, $gj, $VL, $DL, $em, $VB, $r, $nTel, $a, $d)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        
        $ab = new About($DL, $VL, $nTel, $em, $a, $VB, $r, $d);
        $idAbout = $ab->getId1($id);
        $temp = $ab->update($idAbout, $DL, $VL, $nTel, $em, $a, $VB, $r, $d);
        
        $sql = "UPDATE Profesori SET Emri='".$e."', Mbiemri='".$m."', UserName='".$uN."',Gjinia='".$gj."' WHERE ID=".$id."";
        
        
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
    
    public function getPostimin($userName)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        
        $idP = Profesori::returnID($userName);
        
        $sql = "SELECT * FROM profesori as p INNER JOIN postimi as pos ON p.ID = ".$idP." AND pos.FK_Profi = ".$idP."";
        
        $result = mysqli_query($con, $sql);
        
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                echo "<div class='panel panel-default post'>"
                            ."<div class='panel-body'>"
                                ."<div class='row'>"
                                    ."<div class='col-sm-2'>"
                                        ."<a class='post-avatar thumbnail' href='#'>"
                                            ."<img src='img/user.png'>"
                                            ."<div class='text-center'>".$row['Emri']." ".$row['Mbiemri']."</div>"
                                        ."</a>"
                                        ."<div class='likes text-center'><i class='fa fa-thumbs-o-up' aria-hidden='true'></i> 20 likes</div>"
                                    ."</div>"
                                    ."<div class='col-sm-10'>"
                                        ."<div class='bubble'>"
                                            ."<div class='pointer'>"
                                                ."<p>"
                                                    .$row["Tekst"]
                                                ."</p>"
                                            ."</div>"
                                            ."<div class='pointer-border'></div>"
                                        ."</div>"
                                        ."<p class='post-actions'><a href='#'>Comment</a> - <a href='#'>Like</a> - <a href='#'>Follow</a> - <a href='#'>Share</a></p>"
                                        ."<div class='comment-form'>"
                                            ."<form class='form-inline'>"
                                                ."<div class='form-group'>"
                                                    ."<input type='text' class='form-control' id='inputComment' placeholder='Write a comment...'>"
                                                ."</div>"
                                                ."<button type='submit' class='btn btn-default'>Add</button>"
                                            ."</form>"
                                        ."</div><!-- comment-form end -->"
                                        ."<div class='clearfix'></div>"
                                        ."<div class='comments'>"
                                            ."<div class='comment'>"
                                                ."<a class='comment-avatar pull-left' href='#'><img src='img/user.png'></a>"
                                                ."<div class='comment-text'>"
                                                    ."<p>Sed convallis est in ante sodales</p>"
                                                ."</div>"
                                            ."</div>"
                                            ."<div class='clearfix'></div>"

                                            ."<div class='comment'>"
                                                ."<a class='comment-avatar pull-left' href='#'><img src='img/user.png'></a>"
                                                ."<div class='comment-text'>"
                                                    ."<p>Sed convallis est in ante sodales</p>"
                                               ."</div>"
                                            ."</div>"
                                            ."<div class='clearfix'></div>"
                                        ."</div>"
                                    ."</div>"
                                ."</div>"
                            ."</div>"
                        ."</div>";
            }
        }
    }
}

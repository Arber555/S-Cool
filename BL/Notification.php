<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Notification
 *
 * @author Edmond
 */
class Notification {
    
    private $Fk_postimi;
    private $Fk_profi;
    private $Fk_Grupi;
    
    function __construct($Fk_postimi, $Fk_profi, $Fk_Grupi) {
        $this->Fk_postimi = $Fk_postimi;
        $this->Fk_profi = $Fk_profi;
        $this->Fk_Grupi = $Fk_Grupi;
    }
    function getFk_postimi() {
        return $this->Fk_postimi;
    }

    function getFk_profi() {
        return $this->Fk_profi;
    }

    function getFk_Grupi() {
        return $this->Fk_Grupi;
    }

    function setFk_postimi($Fk_postimi) {
        $this->Fk_postimi = $Fk_postimi;
    }

    function setFk_profi($Fk_profi) {
        $this->Fk_profi = $Fk_profi;
    }

    function setFk_Grupi($Fk_Grupi) {
        $this->Fk_Grupi = $Fk_Grupi;
    }

    
    public static function insertProfi($idP, $idPos, $idS)
    {    
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        
        $stmt = $con->prepare("INSERT INTO tempnotification (Fk_Postimi, Fk_Profi, FK_Studenti) values (?,?,?)");
        $stmt->bind_param("iii", $idPos, $idP, $idS);
        
        if($stmt->execute())
        {
            $stmt->close();
            return true;
        }
        else
        {
            return false;
        }
    }
    
    public static function insertGrupi($idG, $idPos, $idS)
    {    
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        
        $stmt = $con->prepare("INSERT tempnotification INTO(Fk_Postimi, Fk_Grupi, FK_Studenti) values (?,?,?)");
        $stmt->bind_param("iii", $idPos, $idG, $idS);
        
        if($stmt->execute())
        {
            $stmt->close();
            return true;
        }
        else
        {
            return false;
        }
    }
    
    public static function returnPostProfi($idS)  //qikjo metod e kthen numrin e postimeve qati profit.... atona duhet me bo foren si te postimet me follov pra mi rujt qet send qe e kthen qikjo metod ne array edhe mi qit te notifikacion edhe numrat mi rujt qeti notifikations
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        //getFollowing($id);
        
        $idParray = Studenti::getFollowing($idS);
        $post = array();
        $idProfesorit = array();
        $count = 0;
 
        foreach($idParray as $idP)
        {
            
            $sql = "SELECT * FROM tempnotification where Fk_Profi=".$idP." and FK_Studenti=".$idS." ORDER BY ID DESC";

            $result = mysqli_query($con, $sql);

            if(mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_assoc($result))
                {
                    $idProfesorit[$count] = Profesori::returnEmriMbiemriProfesorit($row["Fk_Profi"]);
                    $post[$count++] = Postimet::getPostText($row["Fk_Postimi"]);
                }
                //print_r($post);
            }
        }
        $arrayX = array();
        
        $arrayX[0] = $count;
        $arrayX[1] = $post;
        $arrayX[2] = $idProfesorit;
        return $arrayX;
    }
    
    public static function x($idP,$idS)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        //getFollowing($id);
        
        $sql = "SELECT * FROM tempnotification where Fk_Profi=".$idP." and FK_Studenti=".$idS."";
        
        $result = mysqli_query($con, $sql);
        if(mysqli_num_rows($result) > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    
    public static function deleteN($idS)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        //getFollowing($id);
        
        $sql = "DELETE FROM tempnotification WHERE FK_Studenti='".$idS."'";
       
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
}

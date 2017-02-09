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

    
    public static function insertProfi($idP, $idPos)
    {    
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        
        $stmt = $con->prepare("INSERT tempnotification INTO(Fk_Postimi, Fk_Profi) values (?,?)");
        $stmt->bind_param("ii", $idPos, $idP);
        
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
    
    public static function insertGrupi($idG, $idPos)
    {    
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        
        $stmt = $con->prepare("INSERT tempnotification INTO(Fk_Postimi, Fk_Grupi) values (?,?)");
        $stmt->bind_param("ii", $idPos, $idG);
        
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
    
    public static function returnPostProfi($idP)  //qikjo metod e kthen numrin e postimeve qati profit.... atona duhet me bo foren si te postimet me follov pra mi rujt qet send qe e kthen qikjo metod ne array edhe mi qit te notifikacion edhe numrat mi rujt qeti notifikations
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        //getFollowing($id);
        
        $sql = "SELECT * FROM tempnotification where Fk_Profi=".$idP."";
        
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
        $arrayX = array();
        $nr = $count+1;
        
        $arrayX[0] = $nr;
        $arrayX[1] = $post;
        return $arrayX;
    }
}

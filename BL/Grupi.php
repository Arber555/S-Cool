<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Grupi
 *
 * @author Arber
 */
class Grupi {
    private $emri;
    private $orariKohes;
    
    public function __construct($e, $oK)
    {
         $this->emri = $e;
         $this->orariKohes = $oK;
    }
    
    function getEmri() {
        return $this->emri;
    }

    function getOrariKohes() {
        return $this->orariKohes;
    }

    function setEmri($emri) {
        $this->emri = $emri;
    }

    function setOrariKohes($orariKohes) {
        $this->orariKohes = $orariKohes;
    }

    function insert(Grupi $g)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        $stmt = $con->prepare("INSERT INTO Fakullteti(Emri, Orari_Kohes) values (?,?)");
        $stmt->bind_param("ss",$g->emri, $g->orariKohes);
        
        if($stmt->execute())
        {
            $stmt->close();
            return true;
        }
        return false;
    }
    
    function delete($id)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        
        $sql = "DELETE FROM Grupi WHERE id=".$id."";
        
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
    
    function update($emri, $orariKohes)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        
        $sql = "UPDATE Grupi SET Emri='".$emri."', Orari_kohes='".$orariKohes."' WHERE id=".id."";
        
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
}

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Fakullteti
 *
 * @author Arber
 */
class Fakullteti {
    
    private $emri;
    
    public function __construct($e)
    {
        $this->emri = $e;
    }
    
    function setEmri($emri) {
        $this->emri = $emri;
    }

    function getEmri() {
        return $this->emri;
    }

    function insert(Fakullteti $f)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        $stmt = $con->prepare("INSERT INTO Fakullteti(Emri) values (?)");
        $stmt->bind_param("s",$f->emri);
        
        if($stmt->execute())
        {
            $stmt->close();
            return true;
        }
        return false;
    }
    
    
    function delete(Fakullteti $f)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        
        $sql = "DELETE FROM Fakulteti WHERE id=".$f->emri."";
        
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
    
    function update(Fakullteti $f, $emri)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        
        $sql = "UPDATE Fakullteti SET name='".$emri."' WHERE emri=".$f->emri."";
        
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

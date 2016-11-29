<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Drejtimi
 *
 * @author Edmond
 */
class Drejtimi 
{
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

    function insert(Drejtimi $f)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        $stmt = $con->prepare("INSERT INTO Drejtimi(Emri) values (?)");
        $stmt->bind_param("s",$f->emri);
        
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
        
        $sql = "DELETE FROM Drejtimi WHERE id=".$id."";
        
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
    
    function update(Drejtimi $f, $emri)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        
        $sql = "UPDATE Drejtimi SET Emri='".$emri."' WHERE emri=".$f->emri."";
        
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

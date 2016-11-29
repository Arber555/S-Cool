<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Punesimi
 *
 * @author Edmond
 */
class Punesimi 
{
    private $emriKompanise;
    private $pozita;
    
    public function __construct($e)
    {
        $this->emriKompanise = $e;
    }
    
    function getEmriKompanise() {
        return $this->emriKompanise;
    }

    function getPozita() {
        return $this->pozita;
    }

    function setEmriKompanise($emriKompanise) {
        $this->emriKompanise = $emriKompanise;
    }

    function setPozita($pozita) {
        $this->pozita = $pozita;
    }


    function insert(Pozita $f)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        $stmt = $con->prepare("INSERT INTO Punesimi(Emri, Pozita) values (?,?)");
        $stmt->bind_param("ss",$f->emri, $f->pozita);
        
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
        
        $sql = "DELETE FROM Punesimi WHERE id=".$id."";
        
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
    
    function update($id, $emri, $pozita)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        
        $sql = "UPDATE Punesimi SET Emri='".$emri."' ,Pozita='".$pozita."' WHERE ID=".$id."";
        
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

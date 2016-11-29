<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Edukimi
 *
 * @author Edmond
 */
class Edukimi 
{
    private $emri;
    private $kategoria;
    
    public function __construct($e,$k)
    {
        $this->emri = $e;
        $this->kategoria = $k;
    }
    function getKategoria() {
        return $this->kategoria;
    }
    
    function setKategoria($kategoria) {
        $this->kategoria = $kategoria;
    }
    
    function setEmri($emri) {
        $this->emri = $emri;
    }

    function getEmri() {
        return $this->emri;
    }

    function insert(Edukimi $f)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        $stmt = $con->prepare("INSERT INTO Edukimi(Emri, Kategoria) values (?,?)");
        $stmt->bind_param("ss",$f->emri,$f->kategoria);
        
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
        
        $sql = "DELETE FROM Edukimi WHERE id=".$id."";
        
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
    
    function update($id, $emri, $kategoria)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        
        $sql = "UPDATE Edukimi SET Emri='".$emri."', Kategoria='".$kategoria."' WHERE ID=".$id."";
        
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

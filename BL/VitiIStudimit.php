<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of VitiIStudimit
 *
 * @author Edmond
 */
class VitiIStudimit 
{
    private $viti;
    
    public function __construct($v) 
    {
        $this->viti = $v;
    }
    
    function getViti() {
        return $this->viti;
    }

    function setViti($viti) {
        $this->viti = $viti;
    }

    function insert(VitiIStudimit $v)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        $stmt = $con->prepare("INSERT INTO viti_studimit(Viti)values (?)");
        $stmt->bind_param("s", $v->viti);
        
        if($stmt->execute())
        {
            $stmt->close();
            return true;
        }
        else
        {
            //echo $con->error;
        }
        return false;
    }
    
    function delete($id)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        
        $sql = "DELETE FROM viti_studimit WHERE id=".$id."";
        
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
    
    function update($id, $viti)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        
        $sql = "UPDATE viti_studimit SET Viti='".$viti."' WHERE ID=".$id."";
        
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
    
    public function selectAll()
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        
        $sql = "SELECT * FROM viti_studimit";
        
        $result = mysqli_query($con, $sql);
        
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                echo "<tr onclick='indeksiReshtit(this)'><td>".$row['ID']."</td>"
                        . "<td>".$row['Viti']."</td></tr>";
            }
        }
    }
}

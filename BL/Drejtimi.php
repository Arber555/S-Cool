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

    public function insert(Drejtimi $f)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        $stmt = $con->prepare("INSERT INTO Drejtimi(Emri_Drejtimit) values (?)");
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
    
    function update($id, $emri)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        echo $id;
        $sql = "UPDATE Drejtimi SET Emri='".$emri."' WHERE ID=".$id."";
        
        if($con->query($sql) === TRUE) 
        {
            return true;
        } 
        else 
        {
            return false;
           // echo $con->error;
        }
    }
    
    public function selectAll()
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        
        $sql = "SELECT * FROM Drejtimi";
        
        $result = mysqli_query($con, $sql);
        
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                echo "<tr onclick='indeksiReshtit(this)'><td>".$row['ID']."</td>"
                        . "<td>".$row['Emri_Drejtimit']."</td></tr>";
            }
        }
    }
}

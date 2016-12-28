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
        $stmt = $con->prepare("INSERT INTO Grupi(Emri_g, Orari_Kohes) values (?,?)");
        $stmt->bind_param("ss",$g->emri, $g->orariKohes);
        
        if($stmt->execute())
        {
            $stmt->close();
            return true;
        }
        else
        {
             echo $con->error;
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
    
    function update($id, $emri, $orariKohes)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        
        $sql = "UPDATE Grupi SET Emri_g='".$emri."', Orari_kohes='".$orariKohes."' WHERE id=".$id."";
        
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
        
        $sql = "SELECT * FROM Grupi";
        
        $result = mysqli_query($con, $sql);
        
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                echo "<tr onclick='indeksiReshtit(this)'><td>".$row['ID']."</td>"
                        . "<td>".$row['Emri_g']."</td>"
                        . "<td>".$row['Orari_Kohes']."</td></tr>";
            }
        }
    }

    public static function returnID($emri)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        
        $sql = "SELECT ID FROM Grupi WHERE Emri_g = '".$emri."'";
        
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
}

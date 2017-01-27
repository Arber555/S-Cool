<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Postimet
 *
 * @author Arber
 */
class Postimet {
    private $tekst;
    private $fileName;
    private $fileType;
    private $fileSize;
   //private $content;
    
    function __construct($tekst, $fileName, $fileType, $fileSize) {
        $this->tekst = $tekst;
        $this->fileName = $fileName;
        $this->fileType = $fileType;
        $this->fileSize = $fileSize;
        //$this->content = $content;
    }
    
    function getTekst() {
        return $this->tekst;
    }

    function getFileName() {
        return $this->fileName;
    }

    function getFileType() {
        return $this->fileType;
    }

    function getFileSize() {
        return $this->fileSize;
    }

    /*function getContent() {
        return $this->content;
    }*/

    function setTekst($tekst) {
        $this->tekst = $tekst;
    }

    function setFileName($fileName) {
        $this->fileName = $fileName;
    }

    function setFileType($fileType) {
        $this->fileType = $fileType;
    }

    function setFileSize($fileSize) {
        $this->fileSize = $fileSize;
    }


    /*function setContent($content) {
        $this->content = $content;
    }*/

    /*
     * 
     *     private $tekst;
    private $fileName;
    private $fileType;
    private $fileSize;
    private $content;
     */
    
    public static function insertP(Postimet $p, $idP)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        $stmt = $con->prepare("INSERT INTO Postimi(Tekst, File_Name, File_Type, File_Size, FK_Profi) values (?,?,?,?,?)");
        $stmt->bind_param("sssii",$p->tekst, $p->fileName, $p->fileType, $p->fileSize, $idP);
        
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
    
    public static function insertPFileStudenti(Postimet $p, $idS, $idG)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        $stmt = $con->prepare("INSERT INTO Postimi(Tekst, File_Name, File_Type, File_Size, FK_Studenti, FK_Grupi) values (?,?,?,?,?,?)");
        $stmt->bind_param("sssiii",$p->tekst, $p->fileName, $p->fileType, $p->fileSize, $idS, $idG);
        
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
    
    
    public static function insertPTekst($tekst, $idP)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        $stmt = $con->prepare("INSERT INTO Postimi(Tekst, FK_Profi) values (?,?)");
        $stmt->bind_param("si",$tekst, $idS);
        
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
    
    public static function insertPTekstStudenti($tekst, $idS, $idG)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        $stmt = $con->prepare("INSERT INTO Postimi(Tekst, FK_Studenti, FK_Grupi) values (?,?,?)");
        $stmt->bind_param("sii",$tekst, $idS, $idG);
        
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
    
    public function deleteP($id)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        
        $sql = "DELETE FROM Postimi WHERE id=".$id."";
        
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
    
    public static function updatePTekst($tekst, $id)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
       
        $sql = "UPDATE Postimi SET Tekst='".$tekst."' WHERE ID=".$id."";
        
        //$sql = "UPDATE `postimi` SET `Tekst` = '".$tekst."' WHERE `postimi`.`ID` =".$id."";
        
        if($con->query($sql) === TRUE) 
        {
            return true;
        } 
        else {
            return false;
            echo "Error updating record: " . $con->error;
        }
    }
    
    public static function updateP($tekst, $fileName, $fileType, $fileSize, $oldFile, $id)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        $folder = "C:\\xampp\\htdocs\\S-Cool\\files\\".$oldFile;
        
        if(unlink($folder))
        {
            echo "u fshi file";
        }
        
        $sql = "UPDATE Postimi SET Tekst='".$tekst."', File_Name='".$fileName."', File_Type='".$fileType."', File_Size='".$fileSize."' WHERE ID=".$id."";
        
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
    
    public static function downloadFile($id)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        
        $sql = "SELECT File_Name, File_Type, File_Size, Content FROM Postimi WHERE ID = '$id'";
        
        $result = mysqli_query($con, $sql);
        if(isset($result))
        {
            list($name, $type, $size, $content) = mysqli_fetch_array($result);
        
            header("Content-length: $size");
            header("Content-type: $type");
            header("Content-Disposition: attachment; filename=$name");
            echo $content;
        }
    }
    
    public static function returnIdAndEmri() //metod testuese
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        
        $sql = "SELECT id, File_Name FROM Postimi";
        $result = mysqli_query($con, $sql) or die('Error, query failed');
        
        if(mysqli_num_rows($result) == 0)
        {
            echo "Database is empty <br>";
        } 
        else
        {
            while(list($id, $name) = mysqli_fetch_array($result))
            {
                //echo "<a href='index.php?id=".$id."' download='".$name."'>".$name."</a> <br>";
                echo "<a href='Files/".$name."' download='".$name."'>".$name."</a> <br>";
            }
        }
    }
    
    public function getPostimet()
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        
        $sql = "SELECT * FROM postimi ORDER BY ID DESC";
        
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
        return $post;
    }
    
    public function getPostimetByLenda($emri) // mundem te klasa lenda me shti po se kena nihere
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        $id = Postimet::getLenda($emri);
  
        $sql = "SELECT * FROM Postimi where FK_Lenda = '".$id."' ORDER BY ID DESC";
        
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
        return $post;
    }
    
    public static function getLenda($emri) //klasen lenda duhet me shti kur bohet
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        
        $sql = "SELECT * FROM Lendet where Emri='".$emri."'";
        
        $result = mysqli_query($con, $sql);
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                return $row['ID'];
            }
        }
        else
        {
            echo "keq!!!!";
        }
    }
    
    public static function insertPLenda(Postimet $p, $idP, $idL)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        $stmt = $con->prepare("INSERT INTO Postimi(Tekst, File_Name, File_Type, File_Size, FK_Profi, FK_Lenda) values (?,?,?,?,?,?)");
        $stmt->bind_param("sssiii",$p->tekst, $p->fileName, $p->fileType, $p->fileSize, $idP, $idL);
        
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
    
    public static function insertPTekstLenda($tekst, $idP, $idL)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        $stmt = $con->prepare("INSERT INTO Postimi(Tekst, FK_Profi, FK_Lenda) values (?,?,?)");
        $stmt->bind_param("sii",$tekst, $idP, $idL);
        
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
    
    public static function getLendet()
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        
        $sql = "SELECT * FROM lendet";
        
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
        return $post;
    }
    
    public static function getProfiLenda($lenda)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        
        $sql = "SELECT * FROM lendet INNER JOIN Profesori ON lendet.FK_Profi=Profesori.ID where lendet.Emri = '".$lenda."'";
        $result = mysqli_query($con, $sql);
        if(mysqli_num_rows($result) > 0)
        {
            
            while($row = mysqli_fetch_assoc($result))
            {
                return $row["FK_Profi"];
            }
        }
    }
}
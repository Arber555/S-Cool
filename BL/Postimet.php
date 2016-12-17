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
    private $content;
    
    function __construct($tekst, $fileName, $fileType, $fileSize, $content) {
        $this->tekst = $tekst;
        $this->fileName = $fileName;
        $this->fileType = $fileType;
        $this->fileSize = $fileSize;
        $this->content = $content;
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

    function getContent() {
        return $this->content;
    }

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

    function setContent($content) {
        $this->content = $content;
    }

    /*
     * 
     *     private $tekst;
    private $fileName;
    private $fileType;
    private $fileSize;
    private $content;
     */
    
    function insertP(Postimet $p, $idP)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        $stmt = $con->prepare("INSERT INTO Postimi(Tekst, File_Name, File_Type, File_Size, Content, FK_Profi) values (?,?,?,?,?,?)");
        $stmt->bind_param("sssisi",$p->tekst, $p->fileName, $p->fileType, $p->fileSize, $p->content, $idP);
        
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
        $stmt->bind_param("si",$tekst, $idP);
        
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
    
    public function updatePTekst($tekst, $id)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
       
        $sql = "UPDATE Postimi SET Tekst='".$tekst."' WHERE ID=".$id."";
        
        if($con->query($sql) === TRUE) 
        {
            return true;
        } 
        else {
            return false;
            //echo "Error updating record: " . $conn->error;
        }
    }
    
    public function updateP($tekst, $fileName, $fileType, $fileSize, $content, $id)
    {
         $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
       
        $sql = "UPDATE Postimi SET Tekst='".$tekst."', File_Name='".$fileName."', File_Type='".$fileType."', File_Size='".$fileSize."', Content='".$content."' WHERE ID=".$id."";
        
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

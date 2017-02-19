<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Foto
 *
 * @author Arber
 */
class Foto {
    
    private $fileName;
    private $fileType;
    private $fileSize;
    
    function __construct($fileName, $fileType, $fileSize) {
        $this->fileName = $fileName;
        $this->fileType = $fileType;
        $this->fileSize = $fileSize;
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

    function setFileName($fileName) {
        $this->fileName = $fileName;
    }

    function setFileType($fileType) {
        $this->fileType = $fileType;
    }

    function setFileSize($fileSize) {
        $this->fileSize = $fileSize;
    }

    public static function insertS(Foto $p, $idS)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        $stmt = $con->prepare("INSERT INTO Foto(File_Name, File_Type, File_Size, FK_Studenti) values (?,?,?,?)");
        $stmt->bind_param("ssii", $p->fileName, $p->fileType, $p->fileSize, $idS);
        
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
    
    public static function insertP(Foto $p, $idP)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        $stmt = $con->prepare("INSERT INTO Foto(File_Name, File_Type, File_Size, FK_Profi) values (?,?,?,?)");
        $stmt->bind_param("ssii", $p->fileName, $p->fileType, $p->fileSize, $idP);
        
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
    
    public static function update($fileName, $fileType, $fileSize, $oldFile, $id)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        $folder = "C:\\xampp\\htdocs\\S-Cool\\foto\\".$oldFile;
        
        if(unlink($folder))
        {
            echo "u fshi file";
        }
        
        $sql = "UPDATE Foto SET File_Name='".$fileName."', File_Type='".$fileType."', File_Size='".$fileSize."' WHERE ID=".$id."";
        
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
    
    public static function getFotoSs($idS)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        
        $sql = "SELECT * FROM Foto Where FK_Studenti = ".$idS."";
        
        $post = array();
        
        $result = mysqli_query($con, $sql);
        //$count = 0;
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_assoc($result)) // mundem if
            {
                $post[0] =  $row['ID'];
                $post[1] =  $row['File_Name'];
            }
        }
        
        return $post;
    }
    
    public static function getFotoSp($idP)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        
        $sql = "SELECT * FROM Foto Where FK_Profi = ".$idP."";
        
        $post = array();
        
        $result = mysqli_query($con, $sql);
        //$count = 0;
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_assoc($result)) // mundem if
            {
                $post[0] =  $row['ID'];
                $post[1] =  $row['File_Name'];
            }
        }
        
        return $post;
    }
    
    public static function getFotoS($idS)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        
        $sql = "SELECT * FROM Foto Where FK_Studenti = ".$idS."";
        
        //$post = array();
        
        $result = mysqli_query($con, $sql);
        //$count = 0;
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_assoc($result)) // mundem if
            {
                return $row['File_Name'];
            }
        }
    }
    
    public static function getFotoP($idP)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        
        $sql = "SELECT * FROM Foto Where FK_Profi = ".$idP."";
        
        //$post = array();
        
        $result = mysqli_query($con, $sql);
        //$count = 0;
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_assoc($result)) // mundem if
            {
                return $row['File_Name'];
            }
        }
    }
    
    public static function getIdS($idS)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        
        $sql = "SELECT * FROM Foto Where FK_Studenti = ".$idS."";
        
        //$post = array();
        
        $result = mysqli_query($con, $sql);
        //$count = 0;
        if(mysqli_num_rows($result) > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    public static function getIdP($idP)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        
        $sql = "SELECT * FROM Foto Where FK_Profi = ".$idP."";
        
        //$post = array();
        
        $result = mysqli_query($con, $sql);
        //$count = 0;
        if(mysqli_num_rows($result) > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
}
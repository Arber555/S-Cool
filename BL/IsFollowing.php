<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of IsFollowing
 *
 * @author Edmond
 */
class IsFollowing 
{
    private $follower;
    private $isFollowing;
    
    public function __construct($f, $i)
    {
        $this->follower = $f;
        $this->isFollowing = $i;
    }
    function getFollower() {
        return $this->follower;
    }
    function getIsFollowing() {
        return $this->isFollowing;
    }
    
    
    function setEmri($follower) {
        $this->follower = $follower;
    }
    function setMbiemri($isFollowing) {
        $this->isFollowing = $isFollowing;
    }
    
    
    public function insert(IsFollowing $i){
        
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        $stmt = $con->prepare("INSERT INTO isfollowing(follower, isFollowing) values (?,?)");
        $stmt->bind_param("ii", $i->follower, $i->isFollowing);
        
        if($stmt->execute())
        {
            $stmt->close();
            return true;
        }
        else
        {
            //echo "Error insert record: " . $con->error;
            return false; 
        }
        
    }

    
    public function delete($follower, $isFollowing)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        
        $sql = "DELETE FROM isfollowing WHERE follower=".$follower." AND isFollowing= ".$isFollowing;
        
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
    
    public static function isFollow($follower, $isFollowing)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        
        $sql = "SELECT * FROM isfollowing WHERE follower=".$follower." AND isFollowing= ".$isFollowing;
        
        $result = mysqli_query($con, $sql);
        
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

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Personi
 *
 * @author Arber
 */
abstract class Personi {
    
    private $emri;
    private $mbiemri;
    private $userName;
    private $password;
    private $nrPersonal;
    private $gjinia;
    
    
    public function __cunstruct($e, $m, $uN, $p, $nrP, $gj)
    {
        $this->emri = $e;
        $this->mbiemri = $m;
        $this->userName = $uN;
        $this->password = $p;
        $this->nrPersonal = $nrP;
        $this->gjinia = $gj;
    }
    
    /*abstract public function insert();
    abstract public function Delete();
    abstract public function update();*/
    
    function getEmri() {
        return $this->emri;
    }

    function getMbiemri() {
        return $this->mbiemri;
    }

    function getUserName() {
        return $this->userName;
    }

    function getPassword() {
        return $this->password;
    }

    function getNrPersonal() {
        return $this->nrPersonal;
    }

    function getGjinia() {
        return $this->gjinia;
    }

    function setEmri($emri) {
        $this->emri = $emri;
    }

    function setMbiemri($mbiemri) {
        $this->mbiemri = $mbiemri;
    }

    function setUserName($userName) {
        $this->userName = $userName;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setNrPersonal($nrPersonal) {
        $this->nrPersonal = $nrPersonal;
    }

    function setGjinia($gjinia) {
        $this->gjinia = $gjinia;
    }
}

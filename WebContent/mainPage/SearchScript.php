<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
    $btnS = filter_input(INPUT_POST, "btnS");
    $text = filter_input(INPUT_POST, "inputS");
    echo $text;
    if(isset($btnS))
    {

        $input = explode(" ", $text);
        echo $input[0];
        findByEmriAndMbiemri($input[0], $input[1]);
    }
    else
    {
        echo "nuk hini!!!";
    }


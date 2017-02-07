<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            spl_autoload_register(function ($class_name) {
                include 'C:\xampp\htdocs\S-Cool\BL/'.$class_name . '.php';
            });
            
            $postimetF = Postimet::getPostimetByFollo(1);
            $temp = array();
            
            for($i=0;$i<sizeof($postimetF);$i++)
            {
                $row = $postimetF[$i];
                //echo $row["ID"]."</br>";
                $temp[$row["ID"]] = $row;
            }
            //asort($temp,1);
            ksort($temp,1);
            //$x = $temp[3];
            //echo $x["ID"];
            
            
            $keys = array_keys($temp);
            foreach($keys as $key) {
                echo $key."</br>";
            }
            
            
            $path = $_SERVER['SERVER_NAME'];
            echo $path."<br>";
            echo $_SERVER['DOCUMENT_ROOT'];
            
            
             
        ?>
    </body>
</html>

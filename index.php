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
            include 'BL/'.$class_name . '.php';
        });
        /*$password = "Arber";
        $salt="AmEl9596";
        // Get the hash, letting the salt be automatically generated
        $hash = crypt($password, $salt);
       
        if(password_verify($password, $hash))
        {
            echo "boni";
        }
        else
        {
            echo "nuk o ka bon";
        }*/
        
            $f = new Fakullteti("SHKI");
            if($f->insert($f))
            {
                echo "u regjistrua fk-ja";
            }
            else
            {
                echo "Nuk eshte regjistrua!!!";
            }
        ?>
    </body>
</html>

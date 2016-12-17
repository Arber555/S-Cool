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
        <a href="StudentiForm.php">Regjistro Student</a>
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
        
           /* $f = new Fakullteti("SHKI");
            if($f->insert($f))
            {
                echo "u regjistrua fk-ja";
            }
            else
            {
                echo "Nuk eshte regjistrua!!!";
            }*/
        
            //$a = new About("1995-12-30", "Pejë", 49888595, "arbermullaa@gmail.com", "Esat Mekuli 53", "Pejë", "", "");
            //$a->insertS($a, 4);
        ?>
        
        <form method="post" enctype="multipart/form-data">
            <table width="350" border="0" cellpadding="1" cellspacing="1" class="box">
            <tr> 
            <td width="246">
            <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
            <input name="userfile" type="file" id="userfile"> 
            </td>
            <td width="80"><input name="upload" type="submit" class="box" id="upload" value=" Upload "></td>
            </tr>
            </table>
        </form>
    </body>
</html>

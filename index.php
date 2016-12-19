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
        
        <!--<form method="post" enctype="multipart/form-data">
            <table width="350" border="0" cellpadding="1" cellspacing="1" class="box">
            <tr> 
            <td width="246">
            <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
            <input name="userfile" type="file" id="userfile"> 
            </td>
            <td width="80"><input name="upload" type="submit" class="box" id="upload" value=" Upload "></td>
            </tr>
            </table>
        </form>-->
        
        <form action="index.php" method="post" enctype="multipart/form-data">
            <input type="file" name="file" />
            <button type="submit" name="upload">upload</button>
        </form>
        
        <?php
            $a = filter_input(INPUT_POST,'upload');
            
            if(isset($a) && $_FILES['file']['size'] > 0)
            {
                $fileName = $_FILES['file']['name'];
                $tmpName  = $_FILES['file']['tmp_name'];
                $fileSize = $_FILES['file']['size'];
                $fileType = $_FILES['file']['type'];
                $folder = "files/";
                
                $target_file = $folder.$fileName;

                if(file_exists($target_file))
                {
                    echo "Sorry, file already exists.";
                }
                else
                {
                    if(move_uploaded_file($tmpName,$target_file) !== null)
                    {
                        $p = new Postimet("teksti abc", $fileName, $fileType, $fileSize);
                        if($p->insertP($p, 1))
                        {
                            echo "U upload fajlli!!!";
                        }
                        else
                        {
                            echo "nuk u bo upload";
                        }
                    }
                }

               
                /*echo $tmpName;
                $fp = fopen($tmpName, 'r');
                $content = fread($fp, filesize($tmpName));
                $content = addslashes($content);
                fclose($fp);*/

                /*if(!get_magic_quotes_gpc())
                {
                    $fileName = addslashes($fileName);
                }*/

                /*$p = new Postimet("teksti abc", $fileName, $fileType, $fileSize, $content);
                if($p->insertP($p, 1))
                {
                    echo "U upload fajlli!!!";
                }
                else
                {
                    echo "nuk u bo upload";
                }*/
            }

            Postimet::returnIdAndEmri();
            
            /*$id= filter_input(INPUT_GET, 'id');
            
            if(isset($id))
            {
                Postimet::downloadFile($id);
                echo "hini";
            }*/
        ?>
    </body>
</html>

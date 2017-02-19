<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    
    <?php include "headd.php" ?>

    <link rel="stylesheet" href="css/professor.css" />
</head>
<body style="padding-top: 65px;">
    <?php include "headerBar.php" ?>
    <div class="container">
        <div class="row">
            <div id="profile" class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10">
                <div class="row">
                    <?php

                        
                        $uN= filter_input(INPUT_GET, 'un');
                        $thisPage = "professorProfileVisit.php?un=".$uN;
                        $data = Profesori::returnProfesorin($uN);
                        $idProfit = Profesori::returnID($uN);
                        $fotoS = "/../S-Cool/foto/".Foto::getFotoP($idProfit);
                    ?>
                    <div class="col-lg-5 col-md-5 col-sm-5">
                        <img id="profileImage" src="<?php echo $fotoS?>">
                    </div><!-- col-md-5 -->
                    <div class="col-lg-7 col-md-7 col-sm-7">
                        <div class="row">
                            <div class="col-md-12">
                                <div>
                                    <!--<h1 id="emri">Ragip Topalli</h1>
                                    <h4 id="qyteti">Pejë</h4>-->
                                    <?php
                                        
                                        $p = new Profesori($data['Emri'], $data['Mbiemri'], $data['UserName'], $data['Password'], $data['Nr_personal'], $data['Gjinia']);
                                        echo "<h1 id='emri' name='emri'>".$data['Emri']." ".$data['Mbiemri']."</h1>"
                                                ."<h4>Profesor</h4>";
                                        /*if(Postimet::insertPTekst("Postimi i dyt nga profi dikushi!!!!", 1))
                                        {
                                            echo "U shtu postimi!!!";
                                        }
                                        else
                                        {
                                            echo "Nuk u shtu postimi!!!";
                                        }*/
                                    ?>
                                    
                                    <form action="<?php echo $thisPage; ?>" method="post" > 
                                        
                                        <?php
                                            $cf = new IsFollowing($_SESSION['ID'], $idProfit);

                                            if($cf->isFollow($_SESSION['ID'], $idProfit) === false)
                                            {
                                        ?>
                                            <button type="submit" name='follow'>Follow</button>
                                        <?php
                                            }
                                            else if($cf->isFollow($_SESSION['ID'], $idProfit) === true)
                                            {
                                                ?>
                                                    <button type="submit" name='follow'>Unfollow</button>
                                                <?php
                                            }
                                            
                                            $follow = filter_input(INPUT_POST, 'follow');
                                            
                                                    
                                            if(isset($follow))
                                            {
                                                if($cf->isFollow($_SESSION['ID'], $idProfit) === false)
                                                {
                                                    if($cf->insert($cf))
                                                    {
                                                        echo 'u bo follow. Veq bone refresh faqen.';
                                                        echo $_SESSION['ID']." - ". $idProfit;
                                                    }
                                                }
                                                else if($cf->isFollow($_SESSION['ID'], $idProfit) === true)
                                                {
                                                    if($cf->delete($_SESSION['ID'], $idProfit))
                                                    {
                                                        echo 'o hek follow. Veq bone refresh faqen.';
                                                    }
                                                }
                                            }

                                        ?>
                                    
                                    </form>
                                </div>
                            </div><!-- col-md-12 -->
                            <div class="col-md-12" id="accordion" role="tablist" aria-multiselectable="true">
                                <div role="tab" id="headingOne">
                                    <h4>
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">Show more...</a>
                                    </h4>
                                </div><!-- panel-heading -->
                                <div id="collapseOne" class="panel-collapse collapse out" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="accordion-content">
                                        <?php
                                            echo "<h4>Vendlindja: ".$data['Vendi_Lindjes']."</h4>";
                                            echo "<h4>Data Lindjes: ".$data['Data_Lindjes']."</h4>";
                                            echo "<h4>Email: ".$data['email']."</h4>";
                                            echo "<h4>vendbanimi: ".$data['vendBanimi']."</h4>";
                                            echo "<h4>Relationship: ".$data['Relationship']."</h4>";
                                            if($data['Gjinia'] == 'M')
                                            {
                                                echo "<h4>Gjinia: Mashkull</h4>";
                                            }
                                            else
                                            {
                                                echo "<h4>Gjinia: Femer</h4>";
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div><!-- accordion -->
                        </div><!-- row -->
                    </div><!-- col-md-7 -->
                </div><!-- row -->
            </div><!-- profile -->
                        
                    <div class="modal fade" id="changeInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Info Editing</h4>
                                </div>                                 
                                <form action="<?php echo $thisPage; ?>" method="post">
                                    <div class="modal-body">
                                            <div class="form-group">
                                                <label for="changeEmri">Emri</label>
                                                <input name="emri" type="text" id="changeEmri" class="form-control" value="<?php echo $data['Emri'] ?>"/>
                                            </div>
                                            <div class="form-group">
                                                <label for="changeMbiemri">Mbiemri</label>
                                                <input name="mbiemri" type="text" id="changeMbiemri" class="form-control" value="<?php echo $data['Mbiemri'] ?>"/>
                                            </div>
                                            <div class="form-group">
                                                <label for="changeMbiemri">Username</label>
                                                <input name="userName" type="text" id="changeMbiemri" class="form-control" value="<?php echo $data['UserName'] ?>"/>
                                            </div>
                                            <div class="form-group">
                                                <label for="changeQyteti">Vendlindja</label>
                                                <input name="vendlindja" type="text" id="changeQyteti" class="form-control" value="<?php echo $data['Vendi_Lindjes'] ?>"/>
                                            </div>
                                            <div class="form-group">
                                                <label for="changeQyteti">Data lindjes</label>
                                                <input name="dataLindjes" type="text" id="changeQyteti" class="form-control" value="<?php echo $data['Data_Lindjes'] ?>"/>
                                            </div>
                                            <div class="form-group">
                                                <label for="changeQyteti">Email</label>
                                                <input name="email" type="text" id="changeQyteti" class="form-control" value="<?php echo $data['email'] ?>"/>
                                            </div>
                                            <div class="form-group">
                                                <label for="changeQyteti">Vendbanimi</label>
                                                <input name="vendbanimi" type="text" id="changeQyteti" class="form-control" value="<?php echo $data['vendBanimi'] ?>"/>
                                            </div>
                                            <div class="form-group">
                                                <label for="changeQyteti">Adresa </label>
                                                <input name="adresa" type="text" id="adresa" class="form-control" value="<?php echo $data['adresa'] ?>"/>
                                            </div>
                                            <div class="form-group">
                                                <label for="changeQyteti">Relationship</label>
                                                <input name="relationship" type="text" id="changeQyteti" class="form-control" value="<?php echo $data['Relationship'] ?>"/>
                                            </div>
                                            <div class="form-group">
                                                <label for="changeQyteti">Nr. Telefonit</label>
                                                <input name="nrTel" type="text" id="nrTel" class="form-control" value="<?php echo $data['Nr_tel'] ?>"/>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Gjinia</label>
                                                    <?php 
                                                        if($data['Gjinia'] == 'M')
                                                        {
                                                            echo "<label class='radio radio-inline'>
                                                                <input name='gjinia' value='M' type='radio' checked='true'>Mashkull
                                                            </label>";
                                                            echo "<label class='radio radio-inline'>
                                                            <input name='gjinia' value='F' type='radio'>Femer</label>";
                                                        }
                                                        else
                                                        {
                                                            echo "<label class='radio radio-inline'>
                                                                <input name='gjinia' value='M' type='radio'>Mashkull
                                                            </label>";
                                                            echo "<label class='radio radio-inline'>
                                                            <input name='gjinia' value='F' type='radio' checked='true'>Femer</label>";
                                                        }    
                                                            
                                                    ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="changeQyteti">Detaje tjera</label>
                                                <input name="detaje" type="text" id="detaje" class="form-control" value="<?php echo $data['Detaje'] ?>"/>
                                            </div>
                                            <div class="form-group">
                                                <label for=changeFoto">Fotoja Profilit
                                                <br>
                                                <label class="btn btn-default btn-file">
                                                <i class="fa fa-camera" aria-hidden="true"></i> Ndrysho Foton e Profilit<input type="file" name="file" style="display: none;">
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button name="usBtn" type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                              </form>
                            </div>
                        </div>
                    </div><!-- modal -->
                    
                    <?php
                        
                        $emri = filter_input(INPUT_POST, 'emri');
                        $mbiemri = filter_input(INPUT_POST, 'mbiemri');
                        $userName = filter_input(INPUT_POST, 'userName');
                        $gjinia = filter_input(INPUT_POST, 'gjinia');
                        //$password = filter_input(INPUT_POST, 'paswword');
                        $vendlindja = filter_input(INPUT_POST, 'vendlindja');
                        $dataLindjes = filter_input(INPUT_POST, 'dataLindjes');
                        $email = filter_input(INPUT_POST, 'email');
                        $vendbanimi = filter_input(INPUT_POST, 'vendbanimi');
                        $relationship = filter_input(INPUT_POST, 'relationship');
                        $usBtn = filter_input(INPUT_POST, 'usBtn');
                        $idProfit = Profesori::returnID($userName);

                        if(isset($usBtn))
                        {
                            if($_FILES['file']['size'] > 0)
                            {
                                $fileName = $_FILES['file']['name'];
                                $tmpName  = $_FILES['file']['tmp_name'];
                                $fileSize = $_FILES['file']['size'];
                                $fileType = $_FILES['file']['type'];
                                $folderFoto = "C:\\xampp\\htdocs\\S-Cool\\foto\\";
                                $target_file = $folderFoto.$fileName;
                                if(move_uploaded_file($tmpName,$target_file) !== null)
                                {
                                    $f = new Foto($fileName, $fileType, $fileSize);
                                    if($f->insertP($f, $idProfit))
                                    {
                                        echo "U upload foto!!!";
                                    }
                                    else
                                    {
                                        echo "nuk u bo foto";
                                    }
                                }
                                    
                                if($p->updateMeAbout($idProfit, $emri, $mbiemri, $userName, $gjinia, $vendlindja, $dataLindjes, $email, $vendbanimi, $relationship, 10101, "adresa", "detajet"))
                                {
                                    Echo "<h3>U editua Profili i studentit</h3>";
                                }
                                else
                                {
                                    Echo "<h3>Nuk u editua Profili i studentit</h3>";
                                }
                            }
                            else
                            {
                                if($p->updateMeAbout($idProfit, $emri, $mbiemri, $userName, $gjinia, $vendlindja, $dataLindjes, $email, $vendbanimi, $relationship, 10101, "adresa", "detajet"))
                                {
                                    Echo "<h3>U editua Profili i profit</h3>";
                                }
                                else
                                {
                                    Echo "<h3>Nuk u editua Profili i profit</h3>";
                                }
                            }
                        } 
                    ?>
                    
                    <div id="posts" class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1" >
                        <?php
                            $textPostimi = filter_input(INPUT_POST, 'textPostimi');
                            $submitPostimi = filter_input(INPUT_POST, 'submitPostimi');
                            $idP = Profesori::returnID($uN);
                            //echo $_FILES['file']['name'];
                            if(isset($submitPostimi))
                            {
                                echo $_FILES['file']['name'];
                            }
                            
                            
                            if(isset($submitPostimi) && $_FILES['file']['size'] > 0)
                            {

                                $fileName = $_FILES['file']['name'];
                                $tmpName  = $_FILES['file']['tmp_name'];
                                $fileSize = $_FILES['file']['size'];
                                $fileType = $_FILES['file']['type'];
                                //$folder = "files/";
                                $folder = "C:\\xampp\\htdocs\\S-Cool\\files\\";
                                $target_file = $folder.$fileName;
                                if(file_exists($target_file))
                                {
                                    echo "Sorry, file already exists.";
                                }
                                else
                                {
                                    if(move_uploaded_file($tmpName,$target_file) !== null)
                                    {
                                        $pos = new Postimet($textPostimi, $fileName, $fileType, $fileSize);
                                        if($pos->insertP($pos, $idP))
                                        {
                                            echo "U upload fajlli!!!";
                                        }
                                        else
                                        {
                                            echo "nuk u bo upload";
                                        }
                                    }
                                }
                            }
                            else if(isset($textPostimi))
                            {
                                if($textPostimi !== "")
                                {
                                    Postimet::insertPTekst($textPostimi, $idP);
                                }
                                else
                                {
                                    echo "Shkruaj ne Postim!!!";
                                }
                            }
                            
                            
                            //$idPostit = filter_input(INPUT_GET,"post");
                            //echo $idPostit;
                            //leximet e postimeve te profit
                            $postimet = $p->getPostimin($uN);
                            
                            for($i=0;$i<count($postimet);$i++)
                            { 
                                $row = $postimet[$i];     // && 
                               // echo $row['File_Name'];
                                $useri = Profesori::returnProfesoriById($row["FK_Profi"]);
                                $fotoMir = "/../S-Cool/foto/".Foto::getFotoP($useri['ID']);
                                $fff = "/../S-Cool/WebContent/mainPage/img/user.png";
                                $rezultati = Foto::getIdP($useri['ID'])? $fotoMir: $fff;
                                if(!isset($row['File_Name'])){
                                echo 

                                "<div id='post' class='row'>"
                                    ."<div class='col-lg-2 col-md-3 col-sm-2 col-xs-12'>"
                                        ."<div class='profile-picture'>"
                                            ."<img id='user-image' class='img-circle' src='".$rezultati."'>"
                                            ."<a>".$row["Emri"]." ".$row["Mbiemri"]."</a>"
                                        ."</div>"
                                    ."</div>"
                                    ."<div class='col-lg-10 col-md-9 col-sm-10 col-xs-12'>"
                                        ."<div class='bubble'>"
                                            ."<div class='pointer'>"
                                                ."<p>"
                                                    .$row['Tekst']
                                                ."</p>"
                                            ."</div>"
                                        ."</div>"
                                    ."</div>"
                                ."</div><!-- row -->";

                                        /*. "<?php"
                                        . " $editText = filter_input(INPUT_POST, 'postime".$count++."');"
                                        . " $BtnSave = filter_input(INPUT_POST, 'save');"
                                        . " if(isset($BtnSave))"
                                        . " {"
                                        . "     $p->updatePTekst($editText, ".row['ID'].");"
                                        . " }"
                                        . "?>";*/
                                }
                                else
                                {
                                    echo 

                                    "<div id='post' class='row'>"
                                        ."<div class='col-lg-2 col-md-3 col-sm-2 col-xs-12'>"
                                            ."<div class='profile-picture'>"
                                                ."<img id='user-image' class='img-circle' src='".$rezultati."'>"
                                                ."<a>".$row["Emri"]." ".$row["Mbiemri"]."</a>"
                                            ."</div>"
                                        ."</div>"
                                        ."<div class='col-lg-10 col-md-9 col-sm-10 col-xs-12'>"
                                            ."<div class='bubble'>"
                                                ."<div class='pointer'>"
                                                    ."<p>"
                                                        .$row['Tekst']
                                                        ."<br>"
                                                        ."<a href='/../S-Cool/files/".$row['File_Name']."' download>".$row['File_Name']."</a>"
                                                    ."</p>"
                                                ."</div>"
                                            ."</div>"
                                        ."</div>"
                                    ."</div><!-- row -->";
                                }
                            }
                        ?>
                    </div><!-- posts -->
                </div><!-- mainRow -->
            </div><!-- container -->

            <script>
                //var x = document.getElementById("editPost");
                var idPost;
                var namePost;
                var action;
                function getID(element) {
                    //alert(element.id);
                    //var a = window.location.href;
                     //window.location.href="<//?php echo $thisPage?>&post="+element.id;
                     //window.location.assign("<//?php echo $thisPage?>&post="+element.id)
                     var x =window.location.href;
                     idPost = element.id;
                     window.history.pushState(null, null, "<?php echo $thisPage?>&post="+idPost);
                     //$.post('<//?php echo $thisPage?>', {post: element.id});
                }
                
                function setURL()
                {
                    window.location.href = "<?php echo $thisPage?>&post="+idPost;
                }
                
                function getName(element)
                {
                    namePost = element.name;
                    //window.history.pushState(null, null, "<//?php echo $thisPage?>&post="+namePost);
                    console.log(namePost);
                }
                
                function setInput()
                {
                    var x = document.getElementById("hPost").value = namePost;
                }
                
                function setAction(element)
                {
                    action = window.location.href;
                    element.action = action;
                }
            </script>
            
            <?php
                //$idPostit = filter_input(INPUT_POST,"post");
               // $idPostit = filter_input(INPUT_POST,"hiddenInput");
                //$idPos = explode(".",$idPostit);
                
               // $textPost = filter_input(INPUT_POST,"textField".$idPostit);
                //$BtnSave = filter_input(INPUT_POST, "saveBtn".$idPostit);
                $idPostit = filter_input(INPUT_GET,"post");
                //$BtnEdit = filter_input(INPUT_POST, "Edit");
                if(isset($idPostit))
                {
                    $HTTP_HOST = filter_input(INPUT_SERVER, 'HTTP_HOST');
                    $REQUEST_URI = filter_input(INPUT_SERVER, 'REQUEST_URI');
                    $url = "http://$HTTP_HOST$REQUEST_URI";
                    //var_dump(parse_url($url));
                    $urlArray = parse_url($url);
                    $urlSplit = explode("=", $urlArray["query"]);
                    //echo $urlSplit[2];
                    
                    
                    $textPost = filter_input(INPUT_POST,"textField".$idPostit);
                    $BtnSave = filter_input(INPUT_POST, "saveBtn".$idPostit);
                    $file = filter_input(INPUT_POST, "hiddenInput");
                    if(!isset($file))
                    {
                        if(isset($BtnSave))
                        {
                            echo $idPostit;
                            Postimet::updatePTekst($textPost, $urlSplit[2]);
                        }
                        else
                        {
                            echo "</br>nuk u modifikua";
                        }
                    }
                    else
                    {
                        //duhet me modifiku se sosht e bome mir!!!
                        if(isset($BtnSave) && $_FILES['file'.$idPostit]['size'] > 0)
                        {
                            $fileName = $_FILES['file'.$idPostit]['name'];
                            $tmpName  = $_FILES['file'.$idPostit]['tmp_name'];
                            $fileSize = $_FILES['file'.$idPostit]['size'];
                            $fileType = $_FILES['file'.$idPostit]['type'];
                            $folder = "C:\\xampp\\htdocs\\S-Cool\\files\\";
                            $target_file = $folder.$fileName;
                            
                            /*if(file_exists($target_file))
                            {
                                echo "Sorry, file already exists.";
                            }*/
                            //else
                            //{
                            
                                if(move_uploaded_file($tmpName,$target_file) !== null)
                                {
                                    //$pos = new Postimet($textPostimi, $fileName, $fileType, $fileSize);
                                    if(Postimet::updateP($textPost, $fileName, $fileType, $fileSize, $file, $idPostit))
                                    {
                                        echo "U editua postimi me file!!!";
                                        $splitURL = explode("&", $url);
                                        ?>
                                            <script>
                                                window.location.href = "<?php echo$splitURL[0]?>";
                                            </script>
                                        <?php
                                        /*flush(); // Flush the buffer
                                        ob_flush();
                                        header("Location: $splitURL[0]");
                                        die;*/
                                    }
                                    else
                                    {
                                        echo "nuk u editua postimi me file!!!";
                                    }
                                }
                            //}
                        }
                        else
                        {
                            echo "</br>nuk u modifikua";
                        }
                    }
                }
            ?>
</body>
</html>

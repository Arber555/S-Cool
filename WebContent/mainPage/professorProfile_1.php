<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>    

    <?php include "headd.php" ?>

    <link rel="stylesheet" href="css/professor.css" />
</head>
<body>
    <?php include "headerBar.php" ?>
    <div class="container">
        <div class="row">
            <div id="profile" class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10">
                <div class="row">
                    <?php

                        
                        //$uN= filter_input(INPUT_GET, 'un');
                        $thisPage = "professorProfile_1.php?un=".$_SESSION['username'];
                        $idProfit = Profesori::returnID($_SESSION['username']);
                        $fotoS = "/../S-Cool/foto/".Foto::getFotoP($idProfit);
                        //echo $fotoS;
                    ?>
                    <div id="flex" class="col-lg-5 col-md-5 col-sm-5">
                        <?php
                            
                            if($_SESSION['isStudent'] === false)
                            {
                                if(Foto::getIdP($_SESSION['ID']))
                                {
                        ?>
                                    <img id="profileImage" src="<?php echo $fotoS; ?>">
                        <?php
                                }
                                else
                                {
                        ?>
                                    <img id="profileImage" src="/../S-Cool/WebContent/mainPage/img/user.png">
                        <?php
                                }
                            }
                        ?>
                    </div><!-- col-md-5 -->
                    <div class="col-lg-7 col-md-7 col-sm-7">
                        <div class="row">
                            <div class="col-md-12">
                                <div>
                                    <?php
                                        
                                        if($_SESSION['isStudent'] === false)
                                        {
                                            $b = About::returnBooleanAboutProfesori($_SESSION['ID']);
                                            if($b === false)
                                            {
                                                $data = Profesori::returnProfinPaAbout($_SESSION['username']);
                                            }
                                            else
                                            {
                                                $data = Profesori::returnProfesorin($_SESSION['username']);
                                            }
                                        }
                                        $p = new Profesori($data['Emri'], $data['Mbiemri'], $data['UserName'], $data['Password'], $data['Nr_personal'], $data['Gjinia']);
                                        echo "<h1 id='emri' name='emri'>".$data['Emri']." ".$data['Mbiemri']."</h1>"
                                                ."<h4>Profesor</h4>";
                                    ?>
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
                                            if($_SESSION['isStudent'] === false)
                                            {
                                                $b = About::returnBooleanAboutProfesori($_SESSION['ID']);
                                                if($b === false)
                                                {
                                                    echo "Ju lutem te shtoni te dhenat tjera.";
                                                }
                                                else
                                                {
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
                                                }
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div><!-- accordion -->
                        </div><!-- row -->
                    </div><!-- col-md-7 -->
                </div><!-- row -->
            </div><!-- profile -->
            <div id="flex" class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                <button id="editButton" type="button" class="btn btn-primary" data-toggle="modal" data-target="#changeInfo">
                    <i class="fa fa-cog"></i>
                </button>
            </div>
                        
            <?php
                if($_SESSION['isStudent'] === false)
                {
                    $b = About::returnBooleanAboutProfesori($_SESSION['ID']);
                    if($b === true)
                    {
            ?>
            <div class="modal fade" id="changeInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="form">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Info Editing</h4>
                        </div>                                 
                        <form action="<?php echo $thisPage; ?>" method="post" enctype="multipart/form-data">
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
                        
                    }
                            else if($b === false)
                            {
                                ?>
                                    <div class="modal fade" id="changeInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="form">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Info Editing</h4>
                                                </div>                                 
                                                <form action="<?php echo $thisPage; ?>" method="post" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="changeQyteti">Vendlindja</label>
                                                            <input name="vendlindja" type="text" id="changeQyteti" class="form-control" value=""/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="changeQyteti">Data lindjes</label>
                                                            <input name="dataLindjes" type="text" id="changeQyteti" class="form-control" value=""/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="changeQyteti">Email</label>
                                                            <input name="email" type="text" id="changeQyteti" class="form-control" value=""/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="changeQyteti">Vendbanimi</label>
                                                            <input name="vendbanimi" type="text" id="changeQyteti" class="form-control" value=""/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="changeQyteti">Adresa </label>
                                                            <input name="adresa" type="text" id="adresa" class="form-control" value=""/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="changeQyteti">Relationship</label>
                                                            <input name="relationship" type="text" id="changeQyteti" class="form-control" value=""/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="changeQyteti">Nr. Telefonit</label>
                                                            <input name="nrTel" type="text" id="nrTel" class="form-control" value=""/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="changeQyteti">Detaje tjera</label>
                                                            <input name="detaje" type="text" id="detaje" class="form-control" value=""/>
                                                        </div>
                                                        <!--<div class="form-group">
                                                            <label for=changeFoto">Fotoja Profilit
                                                            <br>
                                                            <label class="btn btn-default btn-file">
                                                            <i class="fa fa-camera" aria-hidden="true"></i> Ndrysho Foton e Profilit<input type="file" name="file" style="display: none;">
                                                        </div>-->
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <button name="usBtn" type="sumit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div><!-- modal -->
                                <?php
                            }
                        }
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
                        $nrTel = filter_input(INPUT_POST, 'nrTel');
                        $adresa = filter_input(INPUT_POST, 'adresa');
                        $detajet = filter_input(INPUT_POST, 'detaje');
                        $usBtn = filter_input(INPUT_POST, 'usBtn');

                        if(isset($usBtn))
                        {
                            if($_SESSION['isStudent'] === false)
                                {
                                    $b = About::returnBooleanAboutProfesori($_SESSION['ID']);
                                    if($b === true)
                                    {
                                        if(Foto::getIdP($_SESSION['ID']))
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
                                                    $aa = Foto::getFotoSp($_SESSION['ID']);
                                                    
                                                    if($f->update($fileName, $fileType, $fileSize, $aa[1], $aa[0]))
                                                    {
                                                        echo "U upload foto!!!";
                                                    }
                                                    else
                                                    {
                                                        echo "nuk u bo foto";
                                                    }
                                                }

                                                if($p->updateMeAbout($idProfit, $emri, $mbiemri, $userName, $gjinia, $vendlindja, $dataLindjes, $email, $vendbanimi, $relationship, $nrTel, $adresa, $detajet))
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
                                                if($p->updateMeAbout($idProfit, $emri, $mbiemri, $userName, $gjinia, $vendlindja, $dataLindjes, $email, $vendbanimi, $relationship, $nrTel, $adresa, $detajet))
                                                {
                                                    Echo "<h3>U editua Profili i profit</h3>";
                                                }
                                                else
                                                {
                                                    Echo "<h3>Nuk u editua Profili i profit</h3>";
                                                }
                                            }
                                        }
                                        else
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

                                                if($p->updateMeAbout($idProfit, $emri, $mbiemri, $userName, $gjinia, $vendlindja, $dataLindjes, $email, $vendbanimi, $relationship, $nrTel, $adresa, $detajet))
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
                                                if($p->updateMeAbout($idProfit, $emri, $mbiemri, $userName, $gjinia, $vendlindja, $dataLindjes, $email, $vendbanimi, $relationship, $nrTel, $adresa, $detajet))
                                                {
                                                    Echo "<h3>U editua Profili i profit</h3>";
                                                }
                                                else
                                                {
                                                    Echo "<h3>Nuk u editua Profili i profit</h3>";
                                                }
                                            }
                                        }
                                    }
                                    else if($b === false)
                                    {
                                        $a = new About($dataLindjes, $vendlindja, $nrTel, $email, $adresa, $vendbanimi, $relationship, $detajet);
                                        if($a->insertP($a, $_SESSION['ID']))
                                        {
                                            Echo "<h3>U shtu Profili i profit</h3>";
                                        }
                                        else
                                        {
                                            Echo "<h3>Nuk u shtu Profili i profit</h3>";
                                        }
                                    }
                                }
                        } 
                    ?>
                    
                    <div id="posts" class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1" >
                        <div id="extraRow" class="row">
                            <div class="panel col-xs-12">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Posts</h3>
                                </div>
                                <div class="panel-body">
                                    <form action="<?php echo $thisPage; ?>" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <textarea class="form-control" id="inputPost" placeholder="What's on your mind?" name="textPostimi"></textarea>
                                        </div>
                                        
                                        <div class="post-buttons">
                                            <div class="btn-group pull-right">
                                                <label class="btn btn-default btn-file">
                                                <i class="fa fa-file" aria-hidden="true"></i> File<input type="file" name="file" style="display: none;">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-default pull-left" name="submitPostimi">Submit</button>
                                    </form>
                                </div>
                            </div><!-- panel -->
                        </div> <!-- extraRow -->

                        <?php
                            $textPostimi = filter_input(INPUT_POST, 'textPostimi');
                            $submitPostimi = filter_input(INPUT_POST, 'submitPostimi');
                            $idP = Profesori::returnID($_SESSION['username']);
                            //echo $_FILES['file']['name'];
                            if(isset($submitPostimi))
                            {
                                echo $_FILES['file']['name'];
                            }
                            
                            $idSt = IsFollowing::getFollowProfi($idP);
                            
                            
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

                                            foreach($idSt as $i)
                                            {
                                                Notification::insertProfi($idP, Postimet::getPostLastID(), $i);
                                            }
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
                                    Postimet::insertPTekst($textPostimi, $idProfit);
                                    
                                    foreach($idSt as $i)
                                    {
                                        Notification::insertProfi($idProfit, Postimet::getPostLastID(), $i);
                                        
                                    }
                                }
                                else
                                {
                                    echo "Shkruaj ne Postim!!!";
                                }
                            }

                            //leximet e postimeve te profit
                            
                            $postimet = $p->getPostimin($_SESSION['username']);
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
                                            ."<img id='user-image' src='".$rezultati."'>"
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

                                    ."<a class='edit' data-toggle='modal' data-target='#editPost".$row['ID']."' href='#' id='".$row['ID']."' onclick='getID(this)'>Edit</a>"

                                    ."<div class='modal fade' id='editPost".$row['ID']."' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>"
                                        ."<div class='modal-dialog' role='form'>"
                                            ."<div class='modal-content'>"
                                                ."<div class='modal-header'>"
                                                    ."<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>"
                                                    ."<h4 class='modal-title' id='myModalLabel'>Editing Post</h4>"
                                                ."</div>" //action='". $thisPage/*.filter_input(INPUT_GET, 'post')*/ ."'                                
                                                ."<form onclick='getAction(this)' method='post'>"
                                                    ."<div class='modal-body'>" 
                                                        ."<div class='form-group'>"
                                                            ."<input type='text' id='editPost' class='form-control' name='textField".$row['ID']."'/>"
                                                            //."<input type='hidden' id='hPost' class='form-control' name='hiddenInput' value='".$row['ID']."'/>"
                                                        ."</div>"
                                                    ."</div>"
                                                    ."<div class='modal-footer'>"
                                                        ."<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>" //".$row['ID']."
                                                        ."<button type='submit' class='btn btn-primary' onclick='getName(this)' name='saveBtn".$row['ID']."'>Save changes</button>"
                                                    ."</div>"
                                                ."</form>"
                                            ."</div>"
                                        ."</div>"
                                    ."</div><!-- modal -->"
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
                                                ."<img id='user-image' src='".$rezultati."'>"
                                                ."<a>".$row["Emri"]." ".$row["Mbiemri"]."</a>"
                                            ."</div>"
                                        ."</div>"
                                        ."<div class='col-lg-10 col-md-9 col-sm-10 col-xs-12'>"
                                            ."<div class='bubble'>"
                                                ."<div class='pointer'>"
                                                    ."<p>"
                                                        .$row['Tekst']
                                                        ."<a href='/../S-Cool/files/".$row['File_Name']."' download>".$row['File_Name']."</a>"
                                                    ."</p>"
                                                ."</div>"
                                            ."</div>"
                                        ."</div>"

                                        ."<a class='edit' data-toggle='modal' data-target='#editPost".$row['ID']."' href='#' id='".$row['ID']."' onclick='getID(this)'>Edit</a>"

                                        ."<div class='modal fade' id='editPost".$row['ID']."' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>"
                                            ."<div class='modal-dialog' role='form'>"
                                                ."<div class='modal-content'>"
                                                    ."<div class='modal-header'>"
                                                        ."<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>"
                                                        ."<h4 class='modal-title' id='myModalLabel'>Editing Post</h4>"
                                                    ."</div>"   //action='". $thisPage/*.filter_input(INPUT_GET, 'post')*/ ."'                              
                                                    ."<form onclick='getAction(this)' method='post' enctype='multipart/form-data'>"
                                                        ."<div class='modal-body'>"
                                                            ."<div class='form-group'>"
                                                                ."<input type='text' id='editPost' class='form-control' name='textField".$row['ID']."'/>"
                                                                ."<input type='hidden' id='hPost' class='form-control' name='hiddenInput' value='".$row['File_Name']."'/>"
                                                            ."</div>"
                                                            ."<div class='form-group'>"
                                                                ."<label for='changeFile'>File</label>"
                                                                ."<input type='file' id='changeFile' class='form-control' placeholder='Upload a file' name='file".$row['ID']."'/>"
                                                                        ."</div>"
                                                            ."</div>"
                                                            ."<div class='modal-footer'>"
                                                                ."<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>"
                                                                ."<button type='submit' class='btn btn-primary' name='saveBtn".$row['ID']."'>Save changes</button>"
                                                            ."</div>"
                                                    ."</form>"
                                                ."</div>"
                                            ."</div>"
                                        ."</div><!-- modal -->"
                                    ."</div><!-- row -->";
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
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

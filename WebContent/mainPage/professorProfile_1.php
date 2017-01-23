<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <!--<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
    <link rel="stylesheet" href="font/font awesome/css/font-awesome.min.css" />-->
    
    <?php include "headd.php" ?>
    <link rel="stylesheet" href="css/professor.css" />
</head>
<body style="padding-top: 65px;">
    <?php include "headerBar.php" ?>
    <div class="container">
        <div class="row">
            <div id="profile" class="col-md-8">
                <div class="row">
                    <?php
                        spl_autoload_register(function ($class_name) 
                        {
                            include 'C:\xampp\htdocs\S-Cool\BL/'.$class_name . '.php';
                        });

                        
                        //$uN= filter_input(INPUT_GET, 'un');
                        $thisPage = "professorProfile_1.php?un=".$_SESSION['username'];
                        $data = Profesori::returnProfesorin($_SESSION['username']);
                        $idProfit = Profesori::returnID($_SESSION['username']);
                        $fotoS = "/../S-Cool/foto/".Foto::getFotoS($idProfit);
                    ?>
                    <div id="imgContainer" class="col-md-5">
                        <img id="profileImage" src="<?php echo $fotoS?>">
                        <!--<img id="profileImage" src="/../S-Cool/foto/220px-Antonio_Conte.jpg">-->
                    </div><!-- col-md-5 -->
                    <div class="col-md-7">
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
                                </div>
                            </div><!-- col-md-12 -->
                            <div class="col-md-12" id="accordion" role="tablist" aria-multiselectable="true">
                                <div role="tab" id="headingOne">
                                    <h4>
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                            <div class="interactive"><div class="interactive2"></div></div>
                                        </a>
                                       <!-- <button id="editAbout" type="button" class="btn btn-primary" data-toggle="modal" data-target="#changeAbout">
                                            <i class="fa fa-cog"></i>
                                        </button>-->
                                    </h4>
                                    <!--<div class="modal fade" id="changeAbout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="form">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">About Editing</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
                                                        black
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>-->
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
                    <button id="editButton" type="button" class="btn btn-primary" data-toggle="modal" data-target="#changeInfo">
                        <i class="fa fa-cog"></i>
                    </button>
                        
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
                    
                    <div id="posts" class="col-md-12">
                        <div class="panel panel-default">
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
                                            <button type="button" class="btn btn-default"><i class="fa fa-camera" aria-hidden="true"></i> Image</button>
                                            <!--<button class="btn btn-default btn-file" type="file" name="file"><i class="fa fa-file" aria-hidden="true"></i> File</button>-->
                                            <label class="btn btn-default btn-file">
                                            <i class="fa fa-file" aria-hidden="true"></i> File<input type="file" name="file" style="display: none;">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-default pull-left" name="submitPostimi">Submit</button>
                                </form>
                            </div>
                        </div><!-- panel -->
                        <?php
                            $textPostimi = filter_input(INPUT_POST, 'textPostimi');
                            $submitPostimi = filter_input(INPUT_POST, 'submitPostimi');
                            $idP = Profesori::returnID($_SESSION['username']);
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
                            $postimet = $p->getPostimin($_SESSION['username']);
                            
                            for($i=0;$i<count($postimet);$i++)
                            { 
                                $row = $postimet[$i];     // && 
                               // echo $row['File_Name'];
                                if(!isset($row['File_Name'])){
                                echo "<div class='panel panel-default post'>"
                                            ."<div class='panel-body'>"
                                                ."<div class='row'>"
                                                    ."<div class='col-sm-2'>"
                                                        ."<a class='post-avatar thumbnail' href='#'>"
                                                            ."<img src='img/user.png'>"
                                                            ."<div class='text-center'>".$row['Emri']." ".$row['Mbiemri']."</div>"
                                                        ."</a>"
                                                        ."<div class='likes text-center'><i class='fa fa-thumbs-o-up' aria-hidden='true'></i> 20 likes</div>"
                                                    ."</div>"
                                                    ."<div class='col-sm-10'>"
                                                        ."<div class='bubble'>"
                                                            ."<div class='pointer'>"
                                                                ."<p id='textP'>"
                                                                    .$row["Tekst"]."</br>"
                                                                ."</p>"
                                                            ."</div>"
                                                            ."<div class='pointer-border'></div>"
                                                        ."</div>"
                                                        ."<p class='post-actions'><a href='#'>Comment</a> - <a href='#'>Like</a> - <a data-toggle='modal' data-target='#editPost".$row['ID']."' href='#' id='".$row['ID']."' onclick='getID(this)' >Edit</a></p>"
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
                                                       ."</div>"                          
                                                        ."<div class='comment-form'>"
                                                            ."<form class='form-inline'>"
                                                                ."<div class='form-group'>"
                                                                    ."<input type='text' class='form-control' id='inputComment' placeholder='Write a comment...'>"
                                                                ."</div>"
                                                                ."<button type='submit' class='btn btn-default'>Add</button>"
                                                            ."</form>"
                                                        ."</div><!-- comment-form end -->"
                                                        ."<div class='clearfix'></div>"
                                                        ."<div class='comments'>"
                                                            ."<div class='comment'>"
                                                                ."<a class='comment-avatar pull-left' href='#'><img src='img/user.png'></a>"
                                                                ."<div class='comment-text'>"
                                                                    ."<p>Sed convallis est in ante sodales</p>"
                                                                ."</div>"
                                                            ."</div>"
                                                            ."<div class='clearfix'></div>"

                                                            ."<div class='comment'>"
                                                                ."<a class='comment-avatar pull-left' href='#'><img src='img/user.png'></a>"
                                                                ."<div class='comment-text'>"
                                                                    ."<p>Sed convallis est in ante sodales</p>"
                                                               ."</div>"
                                                            ."</div>"
                                                            ."<div class='clearfix'></div>"
                                                        ."</div>"
                                                    ."</div>"
                                                ."</div>"
                                            ."</div>"
                                        ."</div>";

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
                                    echo "<div class='panel panel-default post'>"
                                            ."<div class='panel-body'>"
                                                ."<div class='row'>"
                                                    ."<div class='col-sm-2'>"
                                                        ."<a class='post-avatar thumbnail' href='#'>"
                                                            ."<img src='img/user.png'>"
                                                            ."<div class='text-center'>".$row['Emri']." ".$row['Mbiemri']."</div>"
                                                        ."</a>"
                                                        ."<div class='likes text-center'><i class='fa fa-thumbs-o-up' aria-hidden='true'></i> 20 likes</div>"
                                                    ."</div>"
                                                    ."<div class='col-sm-10'>"
                                                        ."<div class='bubble'>"
                                                            ."<div class='pointer'>"
                                                                ."<p>"
                                                                    .$row["Tekst"]."</br>"
                                                                    ."<a href='/../S-Cool/files/".$row['File_Name']."' download>".$row['File_Name']."</a>"
                                                                ."</p>"
                                                            ."</div>"
                                                            ."<div class='pointer-border'></div>"
                                                        ."</div>"
                                                        ."<p class='post-actions'><a href='#'>Comment</a> - <a href='#'>Like</a> - <a data-toggle='modal' data-target='#editPost".$row['ID']."' href='#' id='".$row['ID']."' onclick='getID(this)' >Edit</a></p>"
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
                                                       ."</div>"                          
                                                        ."<div class='comment-form'>"
                                                            ."<form class='form-inline'>"
                                                                ."<div class='form-group'>"
                                                                    ."<input type='text' class='form-control' id='inputComment' placeholder='Write a comment...'>"
                                                                ."</div>"
                                                                ."<button type='submit' class='btn btn-default'>Add</button>"
                                                            ."</form>"
                                                        ."</div><!-- comment-form end -->"
                                                        ."<div class='clearfix'></div>"
                                                        ."<div class='comments'>"
                                                            ."<div class='comment'>"
                                                                ."<a class='comment-avatar pull-left' href='#'><img src='img/user.png'></a>"
                                                                ."<div class='comment-text'>"
                                                                    ."<p>Sed convallis est in ante sodales</p>"
                                                                ."</div>"
                                                            ."</div>"
                                                            ."<div class='clearfix'></div>"

                                                            ."<div class='comment'>"
                                                                ."<a class='comment-avatar pull-left' href='#'><img src='img/user.png'></a>"
                                                                ."<div class='comment-text'>"
                                                                    ."<p>Sed convallis est in ante sodales</p>"
                                                               ."</div>"
                                                            ."</div>"
                                                            ."<div class='clearfix'></div>"
                                                        ."</div>"
                                                    ."</div>"
                                                ."</div>"
                                            ."</div>"
                                        ."</div>";
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
            <div id="sidebar" class="col-md-4">
                <button class="btn btn-primary">Test button 1</button>
                <button class="btn btn-primary">Test button 2</button>
                <ul id="others">
                    <li>HR Blog<i class="pull-right fa fa-chevron-right"></i></li>
                    <li>Published Articles<i class="pull-right fa fa-chevron-right"></i></li>
                    <li>Rate my professor profile<i class="pull-right fa fa-chevron-right"></i></li>
                    <li>Articles of interest<i class="pull-right fa fa-chevron-right"></i></li>
                </ul>
                <ul id="social">
                    <li id="youtube"><a><i class="fa fa-youtube-play fa-lg"></i></a></li>
                    <li id="facebook"><a><i class="fa fa-facebook fa-lg"></i></a></li>
                    <li id="linkedin"><a><i class="fa fa-linkedin fa-lg"></i></a></li>
                    <li id="twitter"><a><i class="fa fa-twitter fa-lg"></i></a></li>
                    <li id="flickr"><a><i class="fa fa-flickr fa-lg"></i></a><</li>
                </ul>
                <ul id="others">
                    <li>Curriculum Vitae<i class="pull-right fa fa-chevron-circle-down"></i></li>
                    <li>Resume<i class="pull-right fa fa-chevron-circle-down"></i></li>
                    <li>Transcripts<i class="pull-right fa fa-chevron-circle-down"></i></li>
                    <li>Letters of Recommendation<i class="pull-right fa fa-chevron-circle-down"></i></li>
                    <li>Pedagogical Statement<i class="pull-right fa fa-chevron-circle-down"></i></li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-8">

                </div>
                <div class="col-md-8">

                </div>
                <div class="col-md-8">

                </div>
            </div>


        </div>
    </div>
</body>
</html>

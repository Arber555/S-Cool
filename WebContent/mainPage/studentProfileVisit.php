<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <!--<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
    <link rel="stylesheet" href="font/font awesome/css/font-awesome.min.css" />-->
    <link rel="stylesheet" href="css/student.css" />
    <?php include "headd.php" ?>
    
</head>
<body style="padding-top: 65px;">
    <?php include "headerBar.php" ?>
 
    <div class="col-md-10" class="content">
        <div class="row">
            <div id="profile" class="col-md-12">
                <div class="row">
                    <?php
                        spl_autoload_register(function ($class_name) {
                            include 'C:\xampp\htdocs\S-Cool\BL/'.$class_name . '.php';
                        });
                        
                        $uN= filter_input(INPUT_GET, 'un');
                        $thisPage = "studentProfileVisit.php?un=".$uN;
                        $data = Studenti::returnStudentin($uN);
                        $idStudentit = Studenti::returnID($uN);
                        $fotoS = "/../S-Cool/foto/".Foto::getFotoS($idStudentit);
                    ?>
                    <div id="imgContainer" class="col-md-4 col-md-offset-1">
                        <img id="profileImage" src="<?php echo $fotoS?>">
                        <!--<img id="profileImage" src="/../S-Cool/foto/486373086.png">-->
                    </div><!-- col-md-5 -->
                    <div class="col-md-5">
                        <div class="row">
                            <div class="col-md-12">
                                <div>
                                    <!--<h1 id="emri">Ragip Topalli</h1>
                                    <h4 id="qyteti">Pejë</h4>-->
                                    <?php
                                        $p = new Studenti($data['Emri'], $data['Mbiemri'], $data['UserName'], $data['Password'], $data['Nr_personal'], $data['Gjinia'], $data['Kryetar']);
                                        echo "<h1 id='emri' name='emri'>".$data['Emri']." ".$data['Mbiemri']."</h1>"
                                                ."<h4>Student</h4>";
                                        
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
                                            $cf = new IsFollowing($_SESSION['ID'], $idStudentit);

                                            if($cf->isFollow($_SESSION['ID'], $idStudentit) === false)
                                            {
                                        ?>
                                            <button type="submit" name='follow'>Follow</button>
                                        <?php
                                            }
                                            else if($cf->isFollow($_SESSION['ID'], $idStudentit) === true)
                                            {
                                                ?>
                                                    <button type="submit" name='follow'>Unfollow</button>
                                                <?php
                                            }
                                            
                                            $follow = filter_input(INPUT_POST, 'follow');
                                            
                                                    
                                            if(isset($follow))
                                            {
                                                if($cf->isFollow($_SESSION['ID'], $idStudentit) === false)
                                                {
                                                    if($cf->insert($cf))
                                                    {
                                                        echo 'u bo follow. Veq bone refresh faqen.';
                                                    }
                                                }
                                                else if($cf->isFollow($_SESSION['ID'], $idStudentit) === true)
                                                {
                                                    if($cf->delete($_SESSION['ID'], $idStudentit))
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
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                            <div class="interactive"><div class="interactive2"></div></div>
                                        </a>
                                    </h4>
                                </div><!-- panel-heading -->
                                <!--<div id="collapseOne" class="panel-collapse collapse out" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="accordion-content">
                                        Nothing for now
                                    </div>
                                </div>-->
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
                    <!--<button id="editButton" type="button" class="btn btn-primary" data-toggle="modal" data-target="#changeInfo">
                        <i class="fa fa-cog"></i>
                    </button>-->
                    <div class="modal fade" id="changeInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Info Editing</h4>
                                </div>                                 
                                <form action="<?php echo $thisPage; ?>" method="post" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <!--<div class="form-group">
                                            <label for="changeEmri">Name</label>
                                            <input type="text" id="changeEmri" class="form-control" placeholder="Enter Name" />
                                        </div>
                                        <div class="form-group">
                                            <label for="changeMbiemri">Surname</label>
                                            <input type="text" id="changeMbiemri" name="changeMbiemri" class="form-control" placeholder="Enter Surname" />
                                        </div>
                                        <div class="form-group">
                                            <label for="changeQyteti">City</label>
                                            <input type="text" id="changeQyteti"  name="changeQyteti"  class="form-control" placeholder="Enter City" />
                                        </div>
                                        <div class="form-group">
                                            <label for="changeProfilePicture">Profile Picture</label>
                                            <input type="file" id="changeProfilePicture" class="form-control" placeholder="Upload Your Picture" />
                                        </div>-->
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
                                        <button name="usBtn" type="sumit" class="btn btn-primary">Save changes</button>
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
                        $nrTel = filter_input(INPUT_POST, 'nrTel');
                        $adresa = filter_input(INPUT_POST, 'adresa');
                        $detajet = filter_input(INPUT_POST, 'detaje');
                        $usBtn = filter_input(INPUT_POST, 'usBtn');
                        //$idStudentit = Studenti::returnID($userName);
                        $kryetar = Studenti::returnStudentiKryetar($userName);
                        ///
                        $foto;
                        
                        ///
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
                                    if($f->insertS($f, $idStudentit))
                                    {
                                        echo "U upload foto!!!";
                                    }
                                    else
                                    {
                                        echo "nuk u bo foto";
                                    }
                                }
                                    
                                if($p->updateMeAbout($idStudentit, $kryetar, $emri, $mbiemri, $userName, $gjinia, $vendlindja, $dataLindjes, $email, $vendbanimi, $relationship, $nrTel, $adresa, $detajet))
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
                                if($p->updateMeAbout($idStudentit, $kryetar, $emri, $mbiemri, $userName, $gjinia, $vendlindja, $dataLindjes, $email, $vendbanimi, $relationship, $nrTel, $adresa, $detajet))
                                {
                                    Echo "<h3>U editua Profili i studentit</h3>";
                                }
                                else
                                {
                                    Echo "<h3>Nuk u editua Profili i studentit</h3>";
                                }
                            }
                        }
                    ?>

                   <div id="posts" class="col-md-10 col-md-offset-1" style="padding-left: 0px;">

                        <!--<div class="panel panel-default">
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
                                           <!-- <label class="btn btn-default btn-file">
                                            <i class="fa fa-file" aria-hidden="true"></i> File<input type="file" name="file" style="display: none;">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-default pull-left" name="submitPostimi">Submit</button>
                                </form>
                            </div>
                        </div><!-- panel -->
                <!--<div class="panel panel-default post">  
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-2">
                                <a class="post-avatar thumbnail" href="#">
                                    <img src="img/user.png">
                                    <div class="text-center">User2</div>
                                </a>
                                
                            </div>
                            <div class="col-sm-10">
                                <div class="bubble">
                                    <div class="pointer">
                                        <p>
                                            BLLAH BLLAH BLLAH POSTE PER MATEMATIK
                                        </p>
                                    </div>
                                    <div class="pointer-border"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="clearfix"></div>
                -->
                
                <?php
                            /*$textPostimi = filter_input(INPUT_POST, 'textPostimi');
                            $submitPostimi = filter_input(INPUT_POST, 'submitPostimi');
                            $idP = Studenti::returnID($uN);
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
                            }*/
                            
                            
                            //$idPostit = filter_input(INPUT_GET,"post");
                            //echo $idPostit;
                            //leximet e postimeve te profit
                            $postimet = $p->getPostimin($uN);
                            for($i=0;$i<count($postimet);$i++)
                            { 
                                $row = $postimet[$i];     // && 
                               // echo $row['File_Name'];
                                if(!isset($row['File_Name'])){
                                    echo "<div class='panel panel-default post'>" 
                                            ."<div class='panel-body'>"
                                                ."<div class='row'>"
                                                    ."<div class='col-sm-2'>"
                                                       ."<a class='post-avata-r thumbnail' href='#'>"
                                                           ."<img src='img/user.png'>"
                                                            ."<div class='text-center'>User2</div>"
                                                        ."</a>"

                                                    ."</div>"
                                                    ."<div class='col-sm-10'>"
                                                        ."<div class='bubble'>"
                                                            ."<div class='pointer'>"
                                                                ."<p>"
                                                                    .$row['Tekst']
                                                                ."</p>"
                                                            ."</div>"
                                                            ."<div class='pointer-border'></div>"
                                                        ."</div>"
                                                    ."</div>"
                                                ."</div>"
                                            ."</div>"
                                        ."</div>";
                                }
                                else
                                {
                                    echo "<div class='panel panel-default post'>" 
                                            ."<div class='panel-body'>"
                                                ."<div class='row'>"
                                                    ."<div class='col-sm-2'>"
                                                       ."<a class='post-avata-r thumbnail' href='#'>"
                                                           ."<img src='img/user.png'>"
                                                            ."<div class='text-center'>User2</div>"
                                                        ."</a>"

                                                    ."</div>"
                                                    ."<div class='col-sm-10'>"
                                                        ."<div class='bubble'>"
                                                            ."<div class='pointer'>"
                                                                ."<p>"
                                                                    .$row['Tekst']
                                                                ."</p>"
                                                                ."<a href='/../S-Cool/files/".$row['File_Name']."' download>".$row['File_Name']."</a>"
                                                            ."</div>"
                                                            ."<div class='pointer-border'></div>"
                                                        ."</div>"
                                                    ."</div>"
                                                ."</div>"
                                            ."</div>"
                                        ."</div>";
                                }
                            }
                        ?>
                    </div>
                        </div><!-- panel -->

                </div><!-- row -->

            </div><!-- profile -->
            
        </div> <!-- row -->
        <!--<div class="col-sm-2" class="content">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Faculty Groups</h3>
                    </div>
                    <ul class="nav nav-pills nav-stacked">
                        
                        <?php
                            
                            $grupet = Grupi::getGrupet();
                            $userId = Studenti::returnID($uN);

                            for($i = 0; $i < count($grupet); $i++)
                            {
                                $row = $grupet[$i];
                                echo "<li><a href = 'grupi.php?idG=".$row['ID']."&idS=".$userId."'>".$row['Emri_g']."</a></li>";
                            }
                        
                        ?>
                    </ul>
                </div>
        </div>
        <div class="col-sm-2" class="content">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Groups for fun</h3>
                    </div>
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="dizellasht.html">Dizellasht</a></li>
                        <li><a href="#">Kullerat</a></li>
                    </ul>
                </div>
        </div>-->
    </div><!-- col-md-10 col-md-offset-1 -->
</body>
</html>

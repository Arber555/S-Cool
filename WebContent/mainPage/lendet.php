<!DOCTYPE html>

<html>
    <head>
        <title>Lenda</title>
        <?php include "headd.php" ?>

        <link rel="stylesheet" href="css/lendet.css">
    </head>
    <body>
        <?php include "headerBar.php" ?>
        
        <div class="container">
            <div id="extraRow" class="row">
                <div id="posts" class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">

                    <?php

                        $lenda= filter_input(INPUT_GET, 'lenda');
                        $idP = filter_input(INPUT_GET, 'idP');
                        //$idP = $_SESSION['ID'];
                        $thisPage = "lendet.php?lenda=".$lenda."&idP=".$idP;
                
                        if(!$_SESSION['isStudent'])
                        {
                            $idd = Postimet::getProfiLenda($lenda);
                            
                            if($idd == $idP)
                            {
                        
                    ?>

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
                                                        </label>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-default pull-left" name="submitPostimi">Submit</button>
                                            </form>
                                        </div>
                <?php
                        }
                    }
                
                
                    $textPostimi = filter_input(INPUT_POST, 'textPostimi');
                    $submitPostimi = filter_input(INPUT_POST, 'submitPostimi');

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
                                if($pos->insertPLenda($pos, $idP, Postimet::getLenda($lenda)))
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
                            Postimet::insertPTekstLenda($textPostimi, $idP, Postimet::getLenda($lenda));
                        }
                        else
                        {
                            echo "Shkruaj ne Postim!!!";
                        }
                    }
                ?>
                            </div><!-- panel -->
                        </div><!-- extraRow -->  
               <?php
                    $postimet = Postimet::getPostimetByLenda($lenda);
                            
                    for($i=0;$i<count($postimet);$i++)
                    { 
                        $row = $postimet[$i];     // && 
                       // echo $row['File_Name'];

                        $useri = Profesori::returnProfesoriById($row["FK_Profi"]);
                        
                        if(!isset($row['File_Name'])){
                            echo 

                            "<div id='post' class='row'>"
                                ."<div class='col-lg-2 col-md-3 col-sm-2 col-xs-12'>"
                                        ."<div class='profile-picture'>"
                                        ."<img id='user-image' class='img-circle' src='img/arber.jpg'>"
                                        ."<a>".$useri["Emri"]." ".$useri["Mbiemri"]."</a>"
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
                            ."</div>";
                        }

                        else
                        {
                            echo 

                            "<div id='post' class='row'>"
                                ."<div class='col-lg-2 col-md-3 col-sm-2 col-xs-12'>"
                                    ."<div class='profile-picture'>"
                                        ."<img id='user-image' class='img-circle' src='img/arber.jpg'>"
                                        ."<a>".$useri["Emri"]." ".$useri["Mbiemri"]."</a>"
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
                            ."</div>";
                        }
                    }
               ?>       
                </div><!-- posts -->
            </div><!-- row -->
        </div><!-- container -->
    </body>
</html>
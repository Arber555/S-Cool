<!DOCTYPE html>
<?php
    spl_autoload_register(function ($class_name) {
        include 'C:\xampp\htdocs\S-Cool\BL/'.$class_name . '.php';
    });
    
    $lenda= filter_input(INPUT_GET, 'lenda');
    $idP = filter_input(INPUT_GET, 'idP');
    $thisPage = "lendet.php?lenda=".$lenda."&idP=".$idP;
    //lenda=java&idP=1
?>
<html>
    <head>
        <title>Lenda</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="css/student.css" />
        <link rel="stylesheet" href="font/font awesome/css/font-awesome.min.css" />
        <style>
            #sidebar {

            }
        </style>
    </head>
    <body>
        <div id="posts" class="col-md-8 col-md-offset-1">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="studentiProfile.php?un=ArberM"><h3 class="panel-title" style="float: right;">Back to profile</h3></a>
                    <h3 class="panel-title">Lenda</h3>
                </div>
                <div class="panel-body">      
                    <div>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <form action="<?php echo $thisPage; ?>" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <textarea class="form-control" id="inputPost" placeholder="What's on your mind?" name="textPostimi"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-default pull-left" name="submitPostimi">Submit</button>
                                     <div class="post-buttons">
                                        <div class="btn-group pull-right">
                                            <button type="button" class="btn btn-default"><i class="fa fa-camera" aria-hidden="true"></i> Image</button>
                                            <label class="btn btn-default btn-file">
                                            <i class="fa fa-file" aria-hidden="true"></i> File<input type="file" name="file" style="display: none;">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div><!-- panel -->
                    </div>
                </div>
                <?php
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
            <div class="panel panel-default post">  
               <?php
                    $postimet = Postimet::getPostimetByLenda($lenda);
                            
                    for($i=0;$i<count($postimet);$i++)
                    { 
                        $row = $postimet[$i];     // && 
                       // echo $row['File_Name'];

                        $useri = Profesori::returnProfesoriById($row["FK_Profi"]);
                        
                        if(!isset($row['File_Name'])){
                            echo "<div class='panel panel-default post'>" 
                                    ."<div class='panel-body'>"
                                        ."<div class='row'>"
                                            ."<div class='col-sm-2'>"
                                               ."<a class='post-avata-r thumbnail' href='#'>"
                                                   ."<img src='img/user.png'>"
                                                   ."<div class='text-center'>".$useri["Emri"]." ".$useri["Mbiemri"]."</div>"
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
                                                    ."<div class='text-center'>".$useri["Emri"]." ".$useri["Mbiemri"]."</div>"
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
                
                </div>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>
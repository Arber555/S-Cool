<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/professor.css" />
    <link rel="stylesheet" href="font/font awesome/css/font-awesome.min.css" />
</head>
<body>
    <div class="container">
        <div class="row">
            <div id="profile" class="col-md-8">
                <div class="row">
                    <div id="imgContainer" class="col-md-5">
                        <img id="profileImage" src="https://pbs.twimg.com/profile_images/447126660161093632/-ZDDkOo_.jpeg">
                    </div><!-- col-md-5 -->
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-12">
                                <div>
                                    <!--<h1 id="emri">Ragip Topalli</h1>
                                    <h4 id="qyteti">Pejë</h4>-->
                                    <?php
                                        spl_autoload_register(function ($class_name) {
                                            include 'C:\xampp\htdocs\S-Cool\BL/'.$class_name . '.php';
                                        });
                                        
                                        $uN= filter_input(INPUT_GET, 'un');
                                        $thisPage = "professorProfile_1.php?un=".$uN;
                                        $data = Profesori::returnProfesorin($uN);
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
                                                <label for="changeQyteti">Relationship</label>
                                                <input name="relationship" type="text" id="changeQyteti" class="form-control" value="<?php echo $data['Relationship'] ?>"/>
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
                        $usBtn = filter_input(INPUT_POST, 'usBtn');
                        $idProfit = Profesori::returnID($userName);

                        if(isset($usBtn))
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
                            
                            
                            
                            //leximet e postimeve te profit
                            $p->getPostimin($uN);
                        ?>
                    </div>
                </div>
            </div>

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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>

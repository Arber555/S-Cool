<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/student.css" />
    <link rel="stylesheet" href="font/font awesome/css/font-awesome.min.css" />
</head>
<body>
    <div class="col-md-10 col-md-offset-1">
        <div class="row">
            <div id="profile" class="col-md-12">
                <div class="row">
                    <div id="imgContainer" class="col-md-4">
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
                                        $thisPage = "studentiProfile.php?un=".$uN;
                                        $data = Studenti::returnStudentin($uN);
                                        $p = new Studenti($data['Emri'], $data['Mbiemri'], $data['UserName'], $data['Password'], $data['Nr_personal'], $data['Gjinia'], $data['Kryetar']);
                                        echo "<h1 id='emri' name='emri'>".$data['Emri']." ".$data['Mbiemri']."</h1>"
                                                ."<h4>Student</h4>";
                                    ?>
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
                        $idStudentit = Studenti::returnID($userName);
                        $kryetar = Studenti::returnStudentiKryetar($userName);
                        
                        if(isset($usBtn))
                        {          
                            if($p->updateMeAbout($idStudentit, $kryetar, $emri, $mbiemri, $userName, $gjinia, $vendlindja, $dataLindjes, $email, $vendbanimi, $relationship, $nrTel, $adresa, $detajet))
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
                    
                    
                    <div id="posts" class="col-md-10 col-md-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Wall</h3>
                            </div>
                            <div class="panel-body">
                                <div>       
                              <ul class="nav nav-tabs" role="tablist">
                                <?php
                                    $k = Studenti::returnStudentiKryetar($uN);
                                    if(isset($k) && $k === "1")
                                    {
                                        echo "<li role='presentation' class='active'><a href='#myposts' aria-controls='myposts' role='tab' data-toggle='tab'>My Posts</a></li>";
                                    }
                                ?>
                                <li role="presentation"><a href="#java" aria-controls="java" role="tab" data-toggle="tab">Java</a></li>
                                <li role="presentation"><a href="#math" aria-controls="math" role="tab" data-toggle="tab">Math</a></li>
                                <li role="presentation"><a href="#bti" aria-controls="bti" role="tab" data-toggle="tab">BTI</a></li>
                                <?php
                                    if(isset($k) && $k === "1")
                                    {
                                        echo "<li role='presentation'><a href='#grupi' aria-controls='grupi' role='tab' data-toggle='tab'>Grupi</a></li>";
                                    }
                                ?>
                                
                              </ul>
                              <br>
                              <!-- Tab panes -->
                              <div class="tab-content">
                                <?php
                                    
                                    if(isset($k) && $k === "1")
                                    {
                                        echo "<div role='tabpanel' class='tab-pane active' id='myposts'>"
                                            ."<div class='panel panel-default'>"
                                                ."<div class='panel-heading'>"
                                                    ."<h3 class='panel-title'>Posts</h3>"
                                                ."</div>"
                                                ."<div class='panel-body'>"
                                                    ."<form action='<?php echo $thisPage; ?>' method='post'>"
                                                        ."<div class='form-group'>"
                                                            ."<textarea class='form-control' id='inputPost' placeholder=\"What's on your mind?\" name='textPostimi'></textarea>"
                                                        ."</div>"
                                                        ."<button type='submit' class='btn btn-default pull-left' name='submitPostimi'>Submit</button>"
                                                        ."<div class='post-buttons'>"
                                                            ."<div class='btn-group pull-right'>"
                                                                ."<button type='button' class='btn btn-default'><i class='fa fa-camera' aria-hidden='true'></i> Image</button>"
                                                                ."<button type='button' class='btn btn-default'><i class='fa fa-file' aria-hidden='true'></i> File</button>"
                                                            ."</div>"
                                                        ."</div>"
                                                    ."</form>"
                                                ."</div>"
                                            ."</div>"
                                        ."</div>";
                                    }
                                ?>
                                <!--<div role="tabpanel" class="tab-pane active" id="myposts">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Posts</h3>
                                        </div>
                                        <div class="panel-body">
                                            <form action="<?php echo $thisPage; ?>" method="post">
                                                <div class="form-group">
                                                    <textarea class="form-control" id="inputPost" placeholder="What's on your mind?" name="textPostimi"></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-default pull-left" name="submitPostimi">Submit</button>
                                                <div class="post-buttons">
                                                    <div class="btn-group pull-right">
                                                        <button type="button" class="btn btn-default"><i class="fa fa-camera" aria-hidden="true"></i> Image</button>
                                                        <button type="button" class="btn btn-default"><i class="fa fa-file" aria-hidden="true"></i> File</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>-->
                                <div role="tabpanel" class="tab-pane active" id="java">
                                    <div class="panel panel-default post">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <a class="post-avatar thumbnail" href="#">
                                                        <img src="img/user.png">
                                                        <div class="text-center">User1</div>
                                                    </a>
                                                    <!--<div class="likes text-center"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 20 likes</div>-->
                                                </div>
                                                <div class="col-sm-10">
                                                    <div class="bubble">
                                                        <div class="pointer">
                                                            <p>
                                                               BLLAH BLLAH BLLAHH POSTE PER JAVA
                                                            </p>
                                                        </div>
                                                        <div class="pointer-border"></div>
                                                    </div>
                                                    <!--<p class="post-actions"><a href="#">Comment</a> - <a href="#">Like</a> - <a href="#">Follow</a> - <a href="#">Share</a></p>
                                                    <div class="comment-form">
                                                        <form class="form-inline">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="inputComment" placeholder="Write a comment...">
                                                                <button type="submit" class="btn btn-default">Add</button>
                                                            </div>
                                                        </form>
                                                    </div>-->
                                                    <div class="clearfix"></div>
                                                    <!--<div class="comments">
                                                        <div class="comment">
                                                            <a class="comment-avatar pull-left" href="#"><img src="img/user.png"></a>
                                                            <div class="comment-text">
                                                                <p>Sed convallis est in ante sodales</p>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                        <div class="comment">
                                                            <a class="comment-avatar pull-left" href="#"><img src="img/user.png"></a>
                                                            <div class="comment-text">
                                                                <p>Sed convallis est in ante sodales</p>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="math">
                                    <div class="panel panel-default post">
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
                                    <div class="panel panel-default post">
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
                                </div>
                                <div role="tabpanel" class="tab-pane" id="bti">
                                    <div class="panel panel-default post">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <a class="post-avatar thumbnail" href="#">
                                                        <img src="img/user.png">
                                                        <div class="text-center">User3</div>
                                                    </a>
                                                </div>
                                                <div class="col-sm-10">
                                                    <div class="bubble">
                                                        <div class="pointer">
                                                            <p>
                                                                BLLAH BLLAH BLLAH POSTE PER BTI
                                                            </p>
                                                        </div>
                                                        <div class="pointer-border"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 <div role="tabpanel" class="tab-pane" id="grupi"><!-- qetu ja nis qeky send-->
                            <div>       
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#add" aria-controls="add" role="tab" data-toggle="tab">Add Students</a></li>
                                    <li role="presentation"><a href="#remove" aria-controls="remove" role="tab" data-toggle="tab">Remove Students</a></li>
                                </ul>
                                 <br>
                                        <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="add">
                                        <div class="search-bar">
                                            <h3>Search for students</h3>
                                        
                                                <form class="navbar-form" role="search" action="<?php echo $thisPage; ?>" method="post">
                                                  <div class="form-group">
                                                    <input type="text" class="form-control input-lg" placeholder="Search" name="inputS"/>
                                                  </div>
                                                    <button class="btn btn-info btn-lg" type="submit" name="btnS">
                                                      <i class="glyphicon glyphicon-search"></i>
                                                  </button>
                                                </form>
                                       
                                        </div>
                                        <br>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tr>
                                                    <th>User</th>
                                                    <th>Id</th>
                                                    <th>Emri</th>
                                                    <th>Mbiemri</th>
                                                    <!--<th>Drejtimi</th>
                                                    <th>E-mail</th>-->
                                                    <th></th>
                                                </tr>
                                                <?php
                                                    $btnS = filter_input(INPUT_POST, "btnS");
                                                    $text = filter_input(INPUT_POST, "inputS");
                                                    if(isset($btnS))
                                                    {
                                                        echo "hini";
                                                        $input = explode(" ", $text);
                                                        echo $input[0];
                                                        findByEmriAndMbiemri($input[0], $input[1]);
                                                    }
                                                    else
                                                    {
                                                        echo "nuk hini!!!";
                                                    }
                                                ?>
                                                <!--<tr>
                                                    <td>
                                                        <img src="img/user.png" alt="">
                                                    </td>
                                                    <td>141533370</td>
                                                    <td>Ragip</td>
                                                    <td>Topalli</td>
                                                    <td>SHKI</td>
                                                    <td>rt33370@ubt-uni.net</td>
                                                    <td><button class="btn btn-primary">Add</button></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img src="img/user.png" alt="">
                                                    </td>
                                                    <td>141533120</td>
                                                    <td>Edmond</td>
                                                    <td>Laja</td>
                                                    <td>SHKI</td>
                                                    <td>el33120@ubt-uni.net</td>
                                                    <td><button class="btn btn-primary">Add</button></td>
                                                </tr>-->
                                        </table>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="remove">
                                    <div class="search-bar">
                                        <h3>Search for students</h3>
                                        <div id="custom-search-input">
                                            <div class="input-group col-md-12">
                                                <input type="text" class="form-control input-lg" placeholder="Search" />
                                                <span class="input-group-btn">
                                                    <button class="btn btn-info btn-lg" type="button">
                                                        <i class="glyphicon glyphicon-search"></i>
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                <div class="table-responsive">
                                      <table class="table">
                                        <tr>
                                            <th>User</th>
                                            <th>Id</th>
                                            <th>Emri</th>
                                            <th>Mbiemri</th>
                                            <th>Drejtimi</th>
                                            <th>E-mail</th>
                                            <th></th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="img/user.png" alt="">
                                            </td>
                                            <td style="">141533370</td>
                                            <td>Ragip</td>
                                            <td>Topalli</td>
                                            <td>SHKI</td>
                                            <td>rt33370@ubt-uni.net</td>
                                            <td><button class="btn btn-danger">Remove</button></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="img/user.png" alt="">
                                            </td>
                                            <td>141533120</td>
                                            <td>Edmond</td>
                                            <td>Laja</td>
                                            <td>SHKI</td>
                                            <td>el33120@ubt-uni.net</td>
                                            <td><button class="btn btn-danger">Remove</button></td>
                                        </tr>
                                      </table>
                                    </div>
                                    </div>
                                    </div>
                                </div>
                                </div> <!-- qetu mbaron qeky sendd-->
                                </div>
                              </div>
                            </div>
                            </div>
                        </div><!-- panel -->
                    </div><!-- col-md-10 col-md-offset-1 end-->
                </div><!-- row -->
            </div><!-- profile -->
        </div> <!-- row -->
    </div><!-- col-md-10 col-md-offset-1 -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
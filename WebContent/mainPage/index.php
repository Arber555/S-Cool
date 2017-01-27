<!--<!DOCTYPE html>-->
<?php  
        spl_autoload_register(function ($class_name) {
            include 'C:\xampp\htdocs\S-Cool\BL/'.$class_name . '.php';
        });
?>
<html>
  <head>
    <title>S-Cool</title>
      <!--<link rel="stylesheet" href="css/main.css"/>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link rel="stylesheet" href="font/font awesome/css/font-awesome.min.css" />
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      
      <style>
          #posto{
              margin-top: 2%;
          }
          
          #ll{
              margin-top: 1%;
          }
          
      </style>-->
      
      <?php include "headd.php" ?>
      <style>
          body{
              padding-top: 65px;
          }
      </style>
  </head>
  <body>
    <?php include "headerBar.php"  ?>
    
    <div class="page-container">
        <div class="col-md-2 main-sidebar" id="ll">
        <ul class="nav nav-pills nav-stacked">
          <li role="presentation" class="active"><a href="#newsfeed" aria-controls="newsfeed" role="tab" data-toggle="tab">News Feed</a></li>
          <li><a href="#">Latest posts</a></li>
        </ul>
        <br>
        <ul class="nav nav-pills nav-stacked" role="tablist">
          <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Lendet<span class="caret"></span></a>
              <ul class="dropdown-menu dropdown-menu-left">
                <!--<li role="presentation"><a href="http://localhost:8080/S-Cool/WebContent/mainPage/lendet.php?lenda=Java&idP=1" aria-controls="java" role="tab" data-toggle="tab">Java</a></li>
                <li role="presentation"><a href="#math" aria-controls="math" role="tab" data-toggle="tab">Math</a></li>
                <li role="presentation"><a href="#bti" aria-controls="bti" role="tab" data-toggle="tab">BTI</a></li>-->
                <?php
                    $lendet = Postimet::getLendet();
                    $userId1 = Profesori::returnID($_SESSION['username']);
                    
                    for($i = 0; $i < count($lendet); $i++)
                    {
                        $row = $lendet[$i];
                        echo "<li><a href = 'lendet.php?lenda=".$row['Emri']."&idP=".$userId1."'>".$row['Emri']."</a></li>";
                    }
                ?>
              </ul>
          </li>
          <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Grupet<span class="caret"></span></a>
              <ul class="dropdown-menu dropdown-menu-left">
                <!--<li><a href="#">Dizellasht</a></li>
                <li><a href="#">Kullerat</a></li>
                <li class="divider"></li>
                <li><a href="#">Create a Group</a></li>-->
                <?php
                    $grupet = Grupi::getGrupet();
                    $userId = Studenti::returnID($_SESSION['username']);
                    
                    for($i = 0; $i < count($grupet); $i++)
                    {
                        $row = $grupet[$i];
                        echo "<li><a href = 'grupi.php?idG=".$row['ID']."&idS=".$userId."'>".$row['Emri_g']."</a></li>";
                    }
                ?>
              </ul>
            </li>
        </ul>
      </div><!-- end of main-sidebar-->

      <div class="col-md-6">
          <!--<div class="panel panel-primary" >
          <div class="panel-heading">
                <h3 class="panel-title">Create a post</h3>
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
        </div><!-- panel-primary -->

        <div class="tab-content" id="posto">
            <div role="tabpanel" class="tab-pane fade in active" id="newsfeed">
            <?php
                //echo "99";
                $postimet = Postimet::getPostimet();
                //echo "101";  
                for($i=0;$i<count($postimet);$i++)
                { 
                    $row = $postimet[$i];     // && 
                   // echo $row['File_Name'];
                    $useri;
                    if(isset($row["FK_Studenti"]))
                    {
                        $useri = Studenti::getStudentiById($row["FK_Studenti"]);
                    }
                    else
                    {
                        $useri = Profesori::returnProfesoriById($row["FK_Profi"]);
                    }
                    
                    
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
        </div> <!--end of tab-content-->
      </div><!-- end of col-md-6-->
    </div><!-- end of page-container-->
  </body>
</html>

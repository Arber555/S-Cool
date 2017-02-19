<!--<!DOCTYPE html>-->
<html>
  <head>
    <title>S-Cool</title>
      <?php include "headd.php" ?>
      
      <link rel="stylesheet" href="css/main.css">
  </head>
  <body>
    <?php include "headerBar.php"  ?>
    
    <div class="container">
      <div id="extraRow" class="row">
          <div class="col-md-2 col-sm-2 main-sidebar" id="ll">
          <ul>
            <li class="active main-list"><i class="fa fa-book"></i>Lëndët</li>
              <?php
                  $lendet = Postimet::getLendet();
                  $userId1 = Profesori::returnID($_SESSION['username']);
                  
                  for($i = 0; $i < count($lendet); $i++)
                  {
                      $row = $lendet[$i];
                      echo "<li><a href = 'lendet.php?lenda=".$row['Emri']."&idP=".$userId1."'>".$row['Emri']."</a></li>";
                  }
                  if($_SESSION['isStudent'])
                  {
              ?>

            <li class=" active main-list"><i class="fa fa-group"></i>   Grupet</li>
            <?php
                $grupet = Grupi::getGrupet();
                $userId = Studenti::returnID($_SESSION['username']);
                
                for($i = 0; $i < count($grupet); $i++)
                {
                    $row = $grupet[$i];
                    echo "<li><a href = 'grupi.php?idG=".$row['ID']."&idS=".$userId."'>".$row['Emri_g']."</a></li>";
                }
                  }
            ?>
        </ul>
      </div><!-- end of main-sidebar-->

      <div id="post" class="col-lg-9 col-md-9 col-sm-9 col-sm-offset-1 col-xs-10 col-xs-offset-1">
          <div class="tab-content" id="posto">
              <div role="tabpanel" class="tab-pane fade in active" id="newsfeed">
            <?php
            
                //=============================
                $useri;
                if($_SESSION['isStudent'])
                {
                    //$useri = Profesori::returnProfesoriById($row["FK_Profi"]);
                    $arrayID = Studenti::getFollowing($userId);
                        if(!$arrayID == null)
                        {
                            $postimetF = array();
                            for($j=0;$j<sizeof($arrayID);$j++) //mir
                            {
                                $postimetF += Postimet::getPostimetByFollo($arrayID[$j]);//mir
                            }
                            
                            $temp = array();
                            for($j=0;$j<sizeof($postimetF);$j++)//mir
                            {
                                $row1 = $postimetF[$j];
                                //echo $row1["Tekst"];
                                $temp[$row1["ID"]] = $row1;
                            }
                            
                            asort($temp,1); //sorton prej mat madhes te ma e vogla
                            //print_r($temp);
                            $keys = array_keys($temp);
                            foreach($keys as $key) {
                                //echo $key."</br>";  //me key i gjen sendet ne temp edhe i printon postimet
                                $row2 = $temp[$key];
                                //echo $row2["Tekst"];
                                $useri = Profesori::returnProfesoriById($row2["FK_Profi"]);
                                $fotoMir = "/../S-Cool/foto/".Foto::getFotoP($useri['ID']);
                                $fff = "/../S-Cool/WebContent/mainPage/img/user.png";
                                $rezultati = Foto::getIdP($useri['ID'])? $fotoMir: $fff;
                                if(!isset($row2['File_Name']))
                                {
                                    echo 

                                    "<div id='post' class='row'>"
                                      ."<div class='col-lg-2 col-md-3 col-sm-2 col-xs-12'>"
                                        ."<div class='profile-picture'>"
                                          ."<img id='user-image' src='".$rezultati."'>"
                                          ."<a>".$useri["Emri"]." ".$useri["Mbiemri"]."</a>"
                                        ."</div>"
                                      ."</div>"
                                      ."<div class='col-lg-10 col-md-9 col-sm-10 col-xs-12'>"
                                        ."<div class='bubble'>"
                                          ."<div class='pointer'>"
                                            ."<p>"
                                                .$row2['Tekst']
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
                                          ."<img id='user-image' src='".$rezultati."'>"
                                          ."<a>".$useri["Emri"]." ".$useri["Mbiemri"]."</a>"
                                        ."</div>"
                                      ."</div>"
                                      ."<div class='col-lg-10 col-md-9 col-sm-10 col-xs-12'>"
                                        ."<div class='bubble'>"
                                          ."<div class='pointer'>"
                                            ."<p>"
                                                .$row2['Tekst']
                                                ."<a href='/../S-Cool/files/".$row2['File_Name']."' download>".$row2['File_Name']."</a>"
                                            ."</p>"
                                          ."</div>"
                                          ."</div>"
                                      ."</div>"
                                    ."</div>";
                                }
                            }
                        }
                        else
                        {
                            echo "No Following!!!"; 
                            return;
                        }
                }
                else
                {
                    $postimet = Postimet::getPostimet(); 
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
                        
                        $fotoMirProf = "/../S-Cool/foto/".Foto::getFotoP($useri['ID']);
                        $fotoMirStu = "/../S-Cool/foto/".Foto::getFotoS($useri['ID']);
                        $fff = "/../S-Cool/WebContent/mainPage/img/user.png";
                        $rezultati = Foto::getIdP($useri['ID'])? $fotoMirProf: $fff;
                        $rezultati2 = Foto::getIdS($useri['ID'])? $fotoMirStu: $fff;
                        $rezultati3 = $_SESSION['isStudent']? $rezultati2: $rezultati;
                        
                        if(!isset($row['File_Name'])){
                            echo 
                            "<div id='post' class='row'>"
                              ."<div class='col-lg-2 col-md-3 col-sm-2 col-xs-12'>"
                                ."<div class='profile-picture'>"
                                  ."<img id='user-image' src='".$rezultati3."'>"
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
                                  ."<img id='user-image' src='".$rezultati3."'>"
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
                }
            ?>               
            </div>
            </div> <!--end of tab-content-->
          </div><!-- end of col-md-6-->
        </div><!-- row -->
      </div><!-- container -->
  </body>
</html>
<!DOCTYPE html>
<html>
    <head>
        <title>Grupi</title>
        <?php include "headd.php"; ?>

        <link rel="stylesheet" href="css/lendet.css">
    </head>
    <body>
        <?php
            include "headerBar.php";
            
            $idG = filter_input(INPUT_GET, "idG");
            //$idS = filter_input(INPUT_GET, $_SESSION['ID']); 
            $idS = $_SESSION['ID'];
            $thisPage = "grupi.php?idG=".$idG."&idS=".$idS."";
        ?>
        <div class="container">
            <div id="extraRow" class="row">
                <div id="posts" class="col-lg-10 col-lg-offset-1 col-md-7 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
                
                <?php
                    if($_SESSION['Kryetar'] == 1)
                    {
                ?>
                        <div class="col-xs-12">
                            <button id="editButton" type="button" class="btn btn-default" data-toggle="modal" data-target="#changeInfoAdd">
                                <a class="btn btn-primary" href="#"><i class="fa fa-plus" aria-hidden="true"></i> Add Students</a>
                            </button>

                            <div class="modal fade" id="changeInfoAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="form">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                                            <h4 class="modal-title" id="myModalLabel">Add Students</h4>
                                        </div>  

                                        <form action= "<?php echo $thisPage; ?>" method="post">
                                            <div class="modal-body">
                                                <div>
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
                                                        <table class="table" id="example">
                                                            <tr>
                                                                <!--<th>User</th>-->
                                                                <th>Id</th>
                                                                <th>Emri</th>
                                                                <th>Mbiemri</th>
                                                                <th>Drejtimi</th>
                                                                <th>E-mail</th>
                                                            </tr>
                                                            <?php

                                                                    Studenti::selectAllStudentsForGroupA();
                                                            ?>
                                                        </table>
                                                        
                                                        <input type="hidden" id="hPost" class="form-control" name="hiddenInput"/>  
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button name="addBtn" onclick="reshtiTabele()" type="submit" class="btn btn-primary">Add</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div><!-- modal -->
                    <script>
                        var tabelja = document.getElementById("example");
                        var reshti;
                        var z = [];
                        var v = document.getElementById('hPost');
                        function indeksiReshtit(x) 
                        {
                            reshti = x.rowIndex;
                        }

                        function reshtiTabele() 
                        {
                            var x = tabelja.rows[reshti].cells.length;
                            for (var i = 0; i < 5; i++) 
                            {
                                z[i] = tabelja.rows[reshti].cells[i].innerHTML;
                            }
                            console.log(reshti);
                            v.value = z[0];
                            
                        }
                        
                    </script>
                    <?php
                        $addBtn = filter_input(INPUT_POST, "addBtn");
                        $id = filter_input(INPUT_POST, 'hiddenInput');
                        if(isset($addBtn))
                        {
                            Studenti::shtoStudentNeGrup($idG, $id);
                        }
                        
                    ?>
                    
                            <button id="editButton" type="button" class="btn btn-default" data-toggle="modal" data-target="#changeInfoRemove">
                                <a class="btn btn-danger" href="#"><i class="fa fa-trash-o fa-lg"></i> Remove Students</a>
                            </button>

                            <div class="modal fade" id="changeInfoRemove" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="form">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                                            <h4 class="modal-title" id="myModalLabel">Remove Students</h4>
                                        </div>                                 
                                        <form action= "<?php echo $thisPage; ?>" method="post">
                                            <div class="modal-body">
                                                <div>
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
                                                            <table class="table" id="tablee">
                                                            <tr>
                                                                <!--<th>User</th>-->
                                                                <th>Id</th>
                                                                <th>Emri</th>
                                                                <th>Mbiemri</th>
                                                                <th>Drejtimi</th>
                                                                <th>E-mail</th>
                                                            </tr>
                                                            <?php
                                                                Studenti::selectAllStudentsForGroupR($idG);
                                                            ?>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" id="hPost1" class="form-control" name="hInput"/>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button name="rBtn" type="sumit" class='btn btn-danger' onclick="reshtiTabele1()">Remove</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div><!-- modal -->
                        </div>

                <?php
                    if($_SESSION['Kryetar'] == 1)
                    {
                ?>
                    <div id="extraRow" class="row">
                                <div class="panel col-xs-12">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Grupi</h3>
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
                ?>
                
                        </div><!-- row -->
                    </div><!-- extraRow -->
            
            <?php
                $textPostimi = filter_input(INPUT_POST, 'textPostimi');
                $submitPostimi = filter_input(INPUT_POST, 'submitPostimi');
                $idSt = IsFollowing::getFollowProfi($idG);
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
                            if($pos->insertPFileStudenti($pos, $idS, $idG))
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
                        Postimet::insertPTekstStudenti($textPostimi, $idS, $idG);
                    }
                    else
                    {
                        echo "Shkruaj ne Postim!!!";
                    }
                }
                
                
                $postimet = Grupi::getPostimin($idG);
                            
                for($i=0;$i<count($postimet);$i++)
                { 
                    $row = $postimet[$i];
                    $useri = Studenti::getStudentiById($row["FK_Studenti"]);
                    $fotoMirStu = "/../S-Cool/foto/".Foto::getFotoS($useri['ID']);
                    $fff = "/../S-Cool/WebContent/mainPage/img/user.png";
                    $rezultati2 = Foto::getIdS($useri['ID'])? $fotoMirStu: $fff;
                    
                    if(!isset($row['File_Name']))
                    {
                        
                        echo  

                        "<div id='post' class='row'>"
                            ."<div class='col-lg-2 col-md-3 col-sm-2 col-xs-12'>"
                                ."<div class='profile-picture'>"
                                    ."<img id='user-image' class='img-circle' src='".$rezultati2."'>"
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

                    }
                    else
                    {
                        echo 

                        "<div id='post' class='row'>"
                            ."<div class='col-lg-2 col-md-3 col-sm-2 col-xs-12'>"
                                ."<div class='profile-picture'>"
                                    ."<img id='user-image' class='img-circle' src='".$rezultati2."'>"
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
                    }
                }
            ?>
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
            
            <!--<div class="panel panel-default post">  
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
                            if(Postimet::updatePTekst($textPost, $idPostit))
                            {
                                echo "u editua";
                            }
                            else
                            {
                                echo "nuk u editua292";
                            }
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
                            if(Postimet::updatePTekst($textPost, $idPostit))
                            {
                                echo "u editua";
                            }
                            else
                            {
                                echo "nuk u editua292";
                            }
                        }
                    }
                }
            ?>
                </div><!-- posts -->
                
                <?php
                }
                ?>
                <script>
                        var tabelja1 = document.getElementById("tablee");
                        var reshti1;
                        var z1 = [];
                        var v1 = document.getElementById('hPost1');
                        function indeksiReshtit1(x) 
                        {
                            reshti1 = x.rowIndex;
                        }

                        function reshtiTabele1() 
                        {
                            var x = tabelja1.rows[reshti1].cells.length;
                            for (var i = 0; i < 5; i++) 
                            {
                                z1[i] = tabelja1.rows[reshti1].cells[i].innerHTML;
                            }
                        
                            
                            v1.value = z1[0];
                            console.log(reshti1);
                        }
                        
                    </script>
                    <?php
                        $RBtn = filter_input(INPUT_POST, "rBtn");
                        $id = filter_input(INPUT_POST, 'hInput');
                        if(isset($RBtn))
                        {
                            Studenti::fshijStudentNgaGrup($id);
                            
                        }
                        
                    ?>
           
    </body>
</html>

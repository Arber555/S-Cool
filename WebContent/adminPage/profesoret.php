

﻿<!DOCTYPE html>
<html>
<head>
    <title>S-Cool</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="font/css/font-awesome.min.css" />
</head>
<body>
    <div class="header">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mynavbar" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html">S-Cool</a>
                </div><!-- navbar-header -->
                <div class="collapse navbar-collapse" id="mynavbar">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php"><i class="fa fa-home"></i> Dashboard</a></li>
                        <li><a href="studentet.php"><i class="glyphicon glyphicon-education"></i> Studentet</a></li>
                        <li><a href="fakultetet.php"><i class="fa fa-university"></i> Fakultetet</a></li>
                        <li class="active"><a href="profesoret.php"><i class="fa fa-suitcase"></i> Profesorët</a></li>
                        <li><a href="drejtimet.php"><i class="fa fa-random"></i> Drejtimet</a></li>
                        <li><a href="grupet.php"><i class="fa fa-group"></i> Grupet</a></li>
                        <li><a href="vitet.php"><i class="fa fa-calendar"></i> Vitet e Studimit</a></li>
                        <li><a><i class="glyphicon glyphicon-option-vertical"></i></a></li>
                        <li><a href="login.html"><i class="glyphicon glyphicon-log-in"></i> Login</a></li>
                        <li><a href="signup.html"><i class="fa fa-user-plus"></i> Signup</a></li>
                    </ul>
                </div><!-- navbar-collapse-->
            </div><!-- container -->
        </nav><!-- navbar -->
    </div><!-- header -->
    
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="content-box-large">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h3>Regjistrimi i Profesorëve</h3>
                        </div>
                    </div><!-- panel-heading -->
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" action="profesoret.php" method="post">
                            <div class="form-group">
                                <label for="emriProfesorit" class="col-sm-3 control-label">Emri</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="emriProfesorit" name="emri" required="required" placeholder="Emri i profesorit">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="mbiemriProfesorit" class="col-sm-3 control-label">Mbiemri</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="mbiemriProfesorit" name="mbiemri" required="required" placeholder="Mbiemri i profesorit">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="usernameProfesorit" class="col-sm-3 control-label">Username</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="usernameProfesorit" name="userName" required="required" placeholder="Username">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="passwordProfesorit" class="col-sm-3 control-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="passwordProfesorit" name="password" required="required" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="numriPersonalProfesorit" class="col-sm-3 control-label">Nr. Personal</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="numriPersonalProfesorit" name="nrPersonal" required="required" placeholder="Nr. Personal">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Gjinia</label>
                                <div class="col-md-9">
                                    <label class="radio radio-inline">
                                        <input name="gjinia" value="M" type="radio">Mashkull
                                    </label>
                                    <label class="radio radio-inline">
                                        <input name="gjinia" value="F" type="radio">Femer
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <input type="submit" class="btn btn-primary" name="RsBtn" value="Regjistro">
                                </div>
                            </div>
                        </form>
                    </div><!-- panel-body -->
                </div><!-- content-box -->
            </div><!-- col-md-6 -->
        </div><!-- row-->
        
        <?php
        spl_autoload_register(function ($class_name) {
            include 'C:\xampp\htdocs\S-Cool\BL/'.$class_name . '.php';
        });

        $emri = filter_input(INPUT_POST, 'emri');
        $mbiemri = filter_input(INPUT_POST, 'mbiemri');
        $userName = filter_input(INPUT_POST, 'userName');
        $password = filter_input(INPUT_POST, 'password');
        $nrPersonal = filter_input(INPUT_POST, 'nrPersonal');
        $gjinia = filter_input(INPUT_POST, 'gjinia');
        $rsBtn = filter_input(INPUT_POST, 'RsBtn');
        $s = new Profesori($emri, $mbiemri, $userName, $password, $nrPersonal, $gjinia);


        if(isset($rsBtn))
        {
            if($s->insert($s))
            {
                Echo "<h3>U regjistrua Profesori</h3>";
                $rsBtn = null;
                $emri = null;
                $mbiemri = null;
                $userName = null;
                $password = null;
                $nrPersonal = null;
                $gjinia = null;
            }
            else
            {
                Echo "<h3>Nuk u regjistrua Profesori</h3>";
            }
        }
        ?>
        

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="content-box-large">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h3>Tabela e Profesorëve</h3>
                        </div>
                    </div><!-- panel-heading -->
                    <div class="panel-body">
                        <table class="table table-striped table-bordered" id="tabelaProfesoreve">
                            <tr>
                                <th>ID</th>
                                <th>Emri</th>
                                <th>Mbiemri</th>
                                <th>Username</th>
                                <th>Numri Personal</th>
                                <th>Gjinia</th>
                            </tr>  

                            <?php
                                $s->selectAll();
                            ?>
                            

                        </table>

                        <button id="editButton" data-toggle="modal" data-target="#changeProfesori" class="btn btn-primary" onclick="reshtiTabele()">Edito Profesorin</button>
                        <div class="modal fade" id="changeProfesori" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="form">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Info Editing</h4>
                                    </div>
                                    <form action="profesoret.php" method="post">
                                        <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="idStudentit" control-label">ID</label>
                                                    <input type="text" class="form-control" id="id1" name="id1" required="required" placeholder="Id e profesorit" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="emriProfesorit" control-label">Emri</label>
                                                    <input type="text" class="form-control" name="emri1" id="emri1" required="required" placeholder="Emri i profesorit">
                                                </div>
                                                <div class="form-group">
                                                    <label for="mbiemriProfesorit" control-label">Mbiemri</label>
                                                    <input type="text" class="form-control" name="mbiemri1" id="mbiemri1" required="required" placeholder="Mbiemri i profesorit">
                                                </div>
                                                <div class="form-group">
                                                    <label for="usernameProfesorit" control-label">Username</label>
                                                    <input type="text" class="form-control" name="userName1" id="userName1" required="required" placeholder="Username">
                                                </div>
                                                <div class="form-group">
                                                    <label for="numriPersonalProfesorit" control-label>Nr. Personal</label>
                                                    <input type="number" class="form-control" name="nrPersonal1" id="nrPersonal1" required="required" placeholder="Nr. Personal">
                                                </div>
                                                <div class="form-group">
                                                    <label for="gjiniaProfesorit" control-label">Gjinia</label>
                                                    <input id="gjiniaProfesorit" name="gjinia" value="M" type="radio">Mashkull
                                                    <input id="gjiniaProfesorit" name="gjinia" value="F" type="radio">Femer
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" name="fBtn" class="btn btn-danger" onclick="refresh()">Delete</button>
                                            <button type="submit" name="usBtn" class="btn btn-primary" onclick="refresh()">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div><!-- modal -->
                    </div><!-- panel-body -->
                </div><!-- content-box-large -->
            </div><!-- col-md-10 -->
        </div><!-- row -->
    </div><!-- container -->
    
        <script>
            var v0 = document.getElementById('id1');
            var v1 = document.getElementById('emri1');
            var v2 = document.getElementById('mbiemri1');
            var v3 = document.getElementById('userName1');
            var v4 = document.getElementById('nrPersonal1');
            var v5 = document.getElementsByClassName('gjinija1');

            var tabelja = document.getElementById("tabelaProfesoreve");
            var reshti;

            function indeksiReshtit(x) {
                reshti = x.rowIndex;
            }

            function reshtiTabele() {
                var x = tabelja.rows[reshti].cells.length;
                var z = [];
                for (var i = 0; i < 6; i++) {
                    if (i !== 5) {
                        z[i] = tabelja.rows[reshti].cells[i].innerHTML;
                    }
                    else {
                        if ("M" === tabelja.rows[reshti].cells[i].innerHTML) {
                            z[i] = tabelja.rows[reshti].cells[i].innerHTML;
                        }
                        else {
                            z[i] = tabelja.rows[reshti].cells[i].innerHTML;
                        }
                    }
                }

                v0.value = z[0];
                v1.value = z[1];
                v2.value = z[2];
                v3.value = z[3];
                v4.value = z[4];
                console.log(z[5]);
                if (z[5] === "M")
                    v5[0].checked = true;
                else
                    v5[1].checked = true;

                /* v[2].value
                 v[3].value
                 v[4].value
                 v[6].value*/
            }
        </script>

        <?php
            $id1 = filter_input(INPUT_POST, 'id1');
            $emri1 = filter_input(INPUT_POST, 'emri1');
            $mbiemri1 = filter_input(INPUT_POST, 'mbiemri1');
            $userName1 = filter_input(INPUT_POST, 'userName1');
            //$password = filter_input(INPUT_POST, 'paswword');
            $nrPersonal1 = filter_input(INPUT_POST, 'nrPersonal1');
            $gjinia1 = filter_input(INPUT_POST, 'gjinia1');
            $usBtn = filter_input(INPUT_POST, 'usBtn');
            $fBtn = filter_input(INPUT_POST, 'fBtn');

            if(isset($usBtn))
            {
                if($s->update($id1,$emri1, $mbiemri1, $userName1, $nrPersonal1, $gjinia1))
            {
                Echo "<h3>U editua Studenti</h3>";
            }
            else
            {
                Echo "<h3>Nuk u editua Studenti</h3>";
            }
            }

            if(isset($fBtn))
            {
                if($s->delete($id1))
                {
                    Echo "<h3>U fshi Studenti</h3>";
                }
                else
                {
                    Echo "<h3>Nuk u fshi Studenti</h3>";
                }
            }


            /*$s1 = new Studenti($emri, $mbiemri, $userName, $password, $nrPersonal, $gjinia, $kryetari);


            if(isset($usBtn))
            {
            if($s->update($s))
            {
            Echo "<h3>U regjistrua Studenti</h3>";
            }
            else
            {
            Echo "<h3>Nuk u regjistrua Studenti</h3>";
            }
            }*/
        ?>
    

    <footer>
        <div class="container">
            <div class="copy text-center">
                Copyright 2014
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!--<script src="js/tables.js"></script>-->
</body>
</html>
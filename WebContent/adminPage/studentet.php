<!DOCTYPE html>
<html>
<head>
    <title>S-Cool</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="font/css/font-awesome.min.css">
    <link href="css/style.css" rel="stylesheet">

    <style>
    </style>
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
                        <li class="active"><a href="studentet.php"><i class="glyphicon glyphicon-education"></i> Studentet</a></li>
                        <li><a href="fakultetet.php"><i class="fa fa-university"></i> Fakultetet</a></li>
                        <li><a href="profesoret.php"><i class="fa fa-suitcase"></i> Profesorët</a></li>
                        <li><a href="drejtimet.php"><i class="fa fa-random"></i> Drejtimet</a></li>
                        <li><a href="grupet.php"><i class="fa fa-group"></i> Grupet</a></li>
                        <li><a href="vitet.php"><i class="fa fa-calendar"></i> Vitet e Studimit</a></li>
                        <li><a><i class="glyphicon glyphicon-option-vertical"></i></a></li>
                        <li><a href="login.html"><i class="glyphicon glyphicon-log-in"></i> Login</a></li>
                        <li><a href="signup.html"><i class="fa fa-user-plus"></i> Signup</a></li>
                    </ul>
                    <!--<form class="navbar-form">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search...">
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>-->
                    <!-- search -->
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
                            <h3>Regjistrimi i Studenteve</h3>
                        </div>
                    </div><!-- panel-heading -->
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" action="studentet.php" method="post">
                            <div class="form-group">
                                <label for="emriStudentit" class="col-sm-3 control-label">Emri</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="emriStudentit" name="emri" required="required" placeholder="Emri i studentit">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="mbiemriStudentit" class="col-sm-3 control-label">Mbiemri</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="mbiemriStudentit" name="mbiemri" required="required" placeholder="Mbiemri i studentit">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="usernameStudentit" class="col-sm-3 control-label">Username</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="usernameStudentit" name="userName" required="required" placeholder="Username">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="passwordStudentit" class="col-sm-3 control-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="passwordStudentit" name="password" required="required" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="numriPersonalStudentit" class="col-sm-3 control-label">Nr. Personal</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="numriPersonalStudentit" name="nrPersonal" required="required" placeholder="Nr. Personal">
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
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="kryetari" value="1">Kryetar i Grupit
                                        </label>
                                    </div>
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
            $password = filter_input(INPUT_POST, 'paswword');
            $nrPersonal = filter_input(INPUT_POST, 'nrPersonal');
            $gjinia = filter_input(INPUT_POST, 'gjinia');
            $kryetari = filter_input(INPUT_POST, 'kryetari');
            $rsBtn = filter_input(INPUT_POST, 'RsBtn');
            $s = new Studenti($emri, $mbiemri, $userName, $password, $nrPersonal, $gjinia, $kryetari);


            if(isset($rsBtn))
            {
                if($s->insert($s))
                {
                    Echo "<h3>U regjistrua Studenti</h3>";
                }
                else
                {
                    Echo "<h3>Nuk u regjistrua Studenti</h3>";
                }
            }
        ?>
        

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="content-box-large">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h3>Tabela e Studenteve</h3>
                        </div>
                    </div><!-- panel-heading -->
                    <div class="panel-body">
                        <table class="table table-striped table-bordered" id="example">
                            <tr>
                                <th>ID</th>
                                <th>Emri</th>
                                <th>Mbiemri</th>
                                <th>Username</th>
                                <th>Numri Personal</th>
                                <th>Gjinia</th>
                                <th>Kryetar</th>
                            </tr>
                            
                            <?php
                                $s->selectAll();
                            ?>
                        </table>

                        <button class="btn btn-primary" onclick="reshtiTabele()">Edito Studentin</button><br /><br /><br />
                        <button class="btn btn-primary" onclick="refresh()">Refresh</button><br /><br /><br />
                        
                        <form class="form-horizontal" role="form" action="studentet.php" method="post" onsubmit="refresh()">
                            <div class="form-group">
                                <label for="idStudentit" class="col-sm-3 control-label">ID</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="idStudentit1" name="id1" required="required" placeholder="Id e studentit" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="emriStudentit" class="col-sm-3 control-label">Emri</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="emriStudentit1" name="emri1" required="required" placeholder="Emri i studentit">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="mbiemriStudentit" class="col-sm-3 control-label">Mbiemri</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="mbiemriStudentit1" name="mbiemri1" required="required" placeholder="Mbiemri i studentit">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="usernameStudentit" class="col-sm-3 control-label">Username</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="usernameStudentit1" name="userName1" required="required" placeholder="Username">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="numriPersonalStudentit" class="col-sm-3 control-label">Nr. Personal</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="numriPersonalStudentit1" name="nrPersonal1" required="required" placeholder="Nr. Personal">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Gjinia</label>
                                <div class="col-md-9">
                                    <label class="radio radio-inline">
                                        <input name="gjinia1" value="M" type="radio" class="gjinija1">Mashkull
                                    </label>
                                    <label class="radio radio-inline">
                                        <input name="gjinia1" value="F" type="radio" class="gjinija1">Femer
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="kryetari1" value="1" id="kryetar1">Kryetar i Grupit
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <input type="submit" class="btn btn-primary" name="editButton" value="Edito">
                                    <input type="submit" value="Fshijë" class="btn btn-primary" name="fBtn">
                                </div>
                            </div>
                        </form>
                    </div><!-- panel-body -->
                </div><!-- content-box-large -->
            </div><!-- col-md-10 -->
        </div><!-- row -->
    </div><!-- container -->

    
        <script>
            var v0 = document.getElementById('idStudentit1');
            var v1 = document.getElementById('emriStudentit1');
            var v2 = document.getElementById('mbiemriStudentit1');
            var v3 = document.getElementById('usernameStudentit1');
            var v4 = document.getElementById('numriPersonalStudentit1');
            var v5 = document.getElementsByClassName('gjinija1');
            var v6 = document.getElementById('kryetar1');

            var tabelja = document.getElementById("example");
            var reshti;

            function indeksiReshtit(x) {
                reshti = x.rowIndex;
            }

            function reshtiTabele() {
                var x = tabelja.rows[reshti].cells.length;
                var z = [];
                console.log(reshti);
                for (var i = 0; i < 7; i++) {

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
                if (z[5] === "M")
                    v5[0].checked = true;
                else
                    v5[1].checked = true;
                v6.checked = z[6] === "Po" ? true : false;
                
                function refresh()
                {
                    location.reload(true);
                    tabelja.refresh();
                }
                
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
        $kryetari1 = filter_input(INPUT_POST, 'kryetari1');
        $usBtn = filter_input(INPUT_POST, 'editButton');
        $fBtn = filter_input(INPUT_POST, 'fBtn');

        if(isset($usBtn))
        {
            if($s->update($id1,$emri1, $mbiemri1, $userName1, $nrPersonal1, $gjinia1, $kryetari1))
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

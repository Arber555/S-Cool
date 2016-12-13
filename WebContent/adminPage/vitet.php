<!DOCTYPE html>
<html>
<head>
    <title>S-Cool</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/fakultetet.css" />
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
                        <li><a href="profesoret.php"><i class="fa fa-suitcase"></i> Profesorët</a></li>
                        <li><a href="drejtimet.php"><i class="fa fa-random"></i> Drejtimet</a></li>
                        <li><a href="grupet.php"><i class="fa fa-group"></i> Grupet</a></li>
                        <li class="active"><a href="vitet.php"><i class="fa fa-calendar"></i> Vitet e Studimit</a></li>
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
                            <h3>Regjistrimi i Fakulteteve</h3>
                        </div>
                    </div><!-- panel-heading -->
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" action="vitet.php" method="post">
                            <div class="form-group">
                                <label for="viti" class="col-sm-3 control-label">Viti</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="viti" name="viti" required="required" placeholder="Viti">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <input type="submit" class="btn btn-primary" name="RVBtn" value="Regjistro">
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

            $viti = filter_input(INPUT_POST, 'viti');
            $rVBtn = filter_input(INPUT_POST, 'RVBtn');
            $v = new VitiIStudimit($viti);


            if(isset($rVBtn))
            {
                if($v->insert($v))
                {
                    Echo "<h3>U regjistrua Viti</h3>";
                }
                else
                {
                    Echo "<h3>Nuk u regjistrua Viti</h3>";
                }
            }
        ?>
        
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h3>Tabela e Fakulteteve</h3>
                    </div>
                </div><!-- panel-heading -->
                <div class="panel-body">
                    <table class="table table-striped table-bordered" id="tabelaVitit">
                        <tr>
                            <th>ID</th>
                            <th>Viti</th>
                        </tr>
                        <?php
                            $v->selectAll();
                        ?>

                    </table>

                    <input id="editButton" data-toggle="modal" data-target="#changeViti" onclick="reshtiTabele()" type="submit" class="btn btn-primary" value="Edito Vitin"><br /><br /><br />
                </div><!-- panel-body -->
            </div><!-- col-md-4 -->
            <div class="modal fade" id="changeViti" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="form">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Info Editing</h4>
                        </div>
                        <form action="vitet.php" method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="idVitit" control-label">ID</label>
                                    <input type="text" class="form-control" id="idVitit1" name="id1" required="required" placeholder="Id e vitit" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="viti" control-label">Viti</label>
                                    <input type="text" class="form-control" id="viti1" name="viti1" required="required" placeholder="Viti">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" name="fBtn" class="btn btn-danger">Delete</button>
                                <button type="submit" name="usBtn" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- row -->
    </div><!-- container -->
    
        <script>
            var v0 = document.getElementById('idVitit1');
            var v1 = document.getElementById('viti1');

            var tabelja = document.getElementById("tabelaVitit");
            var reshti;

            function indeksiReshtit(x) {
                reshti = x.rowIndex;
            }

            function reshtiTabele() {
                var x = tabelja.rows[reshti].cells.length;
                var z = [];
                for (var i = 0; i < 2; i++) {
                    
                    z[i] = tabelja.rows[reshti].cells[i].innerHTML;
                }
                console.log(z[0]);
                v0.value = z[0];
                v1.value = z[1];

                /* v[2].value
                 v[3].value
                 v[4].value
                 v[6].value*/
            }
        </script>

        <?php
            $id1 = filter_input(INPUT_POST, 'id1');
            $viti1 = filter_input(INPUT_POST, 'viti1');
            $usBtn = filter_input(INPUT_POST, 'usBtn');
            $fBtn = filter_input(INPUT_POST, 'fBtn');

            if(isset($usBtn))
            {
                if($v->update($id1,$viti1))
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
                if($v->delete($id1))
                {
                    Echo "<h3>U fshi Studenti</h3>";
                }
                else
                {
                    Echo "<h3>Nuk u fshi Studenti</h3>";
                }
            }
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

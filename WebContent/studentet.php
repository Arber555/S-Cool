<!DOCTYPE html>
<html>
  <head>
    <title>S-Cool</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jQuery UI -->
    <link href="https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" rel="stylesheet" media="screen">

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">

    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href="vendors/form-helpers/css/bootstrap-formhelpers.min.css" rel="stylesheet">
    <link href="vendors/select/bootstrap-select.min.css" rel="stylesheet">
    <link href="vendors/tags/css/bootstrap-tags.css" rel="stylesheet">

    <link href="css/forms.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    
    <style>
        table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            td, th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }

            tr:nth-child(even) {
                background-color: #dddddd;
            }
    </style>
  </head>
  <body>
  	<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-5">
	              <!-- Logo -->
	              <div class="logo">
	                 <h1><a href="index.html">S-Cool</a></h1>
	              </div>
	           </div>
	           <div class="col-md-5">
	              <div class="row">
	                <div class="col-lg-12">
	                  <div class="input-group form">
	                       <input type="text" class="form-control" placeholder="Search...">
	                       <span class="input-group-btn">
	                         <button class="btn btn-primary" type="button">Search</button>
	                       </span>
	                  </div>
	                </div>
	              </div>
	           </div>
	           <div class="col-md-2">
	              <div class="navbar navbar-inverse" role="banner">
	                  <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
	                    <ul class="nav navbar-nav">
	                      <li class="dropdown">
	                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Account <b class="caret"></b></a>
	                        <ul class="dropdown-menu animated fadeInUp">
	                          <li><a href="profile.html">Profile</a></li>
	                          <li><a href="login.html">Logout</a></li>
	                        </ul>
	                      </li>
	                    </ul>
	                  </nav>
	              </div>
	           </div>
	        </div>
	     </div>
	</div>

    <div class="page-content">
    	<div class="row">
		  <div class="col-md-2">
		  	<div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->
                    <li><a href="index.html"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
                    <li class="current"><a href="studentet.html"><i class="glyphicon glyphicon-calendar"></i> Studentet</a></li>
                    <li><a href="stats.html"><i class="glyphicon glyphicon-stats"></i> Statistics (Charts)</a></li>
                    <li><a href="tables.html"><i class="glyphicon glyphicon-list"></i> Tables</a></li>
                    <li><a href="buttons.html"><i class="glyphicon glyphicon-record"></i> Buttons</a></li>
                    <li><a href="editors.html"><i class="glyphicon glyphicon-pencil"></i> Editors</a></li>
                    <li><a href="forms.html"><i class="glyphicon glyphicon-tasks"></i> Forms</a></li>
                    <li class="submenu">
                         <a href="#">
                            <i class="glyphicon glyphicon-list"></i> Pages
                            <span class="caret pull-right"></span>
                         </a>
                         <!-- Sub menu -->
                         <ul>
                            <li><a href="login.html">Login</a></li>
                            <li><a href="signup.html">Signup</a></li>
                        </ul>
                    </li>
                </ul>
             </div>
		  </div>
		  <div class="col-md-6">
	  					<div class="content-box-large">
			  				<div class="panel-heading">
					            <div class="panel-title">Regjistrimi i Studenteve</div>
					          
					            <div class="panel-options">
					              <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
					              <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
					            </div>
					        </div>
			  				<div class="panel-body">
			  					<form class="form-horizontal" role="form" action="studentet.php" method="post">
								  <div class="form-group">
								    <label for="inputEmail3" class="col-sm-2 control-label">Emri</label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control" id="inputEmail3" name="emri" required="required" placeholder="Emri i studentit">
								    </div>
								  </div>
								  <div class="form-group">
								    <label for="inputEmail3" class="col-sm-2 control-label">Mbiemri</label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control" id="inputEmail4" name="mbiemri" required="required" placeholder="Mbiemri i studentit">
								    </div>
								  </div>
								  <div class="form-group">
								    <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control" id="inputEmail5" name="userName" required="required" placeholder="Username">
								    </div>
								  </div>
								  <div class="form-group">
								    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
								    <div class="col-sm-10">
								      <input type="password" class="form-control" id="inputPassword3" name="password" required="required" placeholder="Password">
								    </div>
								  </div>
								  <div class="form-group">
								    <label for="inputEmail3" class="col-sm-2 control-label">Numri Personal</label>
								    <div class="col-sm-10">
								      <input type="number" class="form-control" id="inputEmail6" name="nrPersonal" required="required" placeholder="Numri Personal">
								    </div>
								  </div>
								  <div class="form-group">
											<label class="col-md-2 control-label">Gjinia</label>
											<div class="col-md-10">
												<label class="radio radio-inline">
													<input name="gjinia" value="M" type="radio">
													Mashkull </label>
												<label class="radio radio-inline">
													<input name="gjinia" value="F" type="radio">
													Femer </label>
											</div>
										</div>
								  <div class="form-group">
								    <div class="col-sm-offset-2 col-sm-10">
								      <div class="checkbox">
								        <label>
								          <input type="checkbox" name="kryetari" value="1"> Kryetar i Grupit
								        </label>
								    </div>
								  </div>
								  <div class="form-group">
								    <div class="col-sm-offset-2 col-sm-10">
								      <input type="submit" class="btn btn-primary" name="RsBtn" value="Regjistro">
								    </div>
								  </div>
								</form>
			  				</div>
			  			</div>
	  				</div>
                      
                      
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

	  				<div class="content-box-large">
  				<div class="panel-heading">
					<div class="panel-title">Tabela e Studenteve</div>
				</div>
  				<div class="panel-body">
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
					
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
                                    <input type="submit" class="btn btn-primary" name="fBtn" value="Fshijë">
                                                    
                                    <input onclick="reshtiTabele()" type="submit" class="btn btn-primary"  value="Edito Studentin">
                                    
                                    <form class="form-horizontal" role="form" action="studentet.php" method="post">
                                                                  <div class="form-group">
								    <label for="inputEmail3" class="col-sm-2 control-label">ID</label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control" id="inputEmail3" name="id1" required="required" placeholder="Id e studentit" readonly>
								    </div>
								  </div>
								  <div class="form-group">
								    <label for="inputEmail3" class="col-sm-2 control-label">Emri</label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control" id="inputEmail3" name="emri1" required="required" placeholder="Emri i studentit">
								    </div>
								  </div>
								  <div class="form-group">
								    <label for="inputEmail3" class="col-sm-2 control-label">Mbiemri</label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control" id="inputEmail4" name="mbiemri1" required="required" placeholder="Mbiemri i studentit">
								    </div>
								  </div>
								  <div class="form-group">
								    <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control" id="inputEmail5" name="userName1" required="required" placeholder="Username">
								    </div>
								  </div>
								  <div class="form-group">
								    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
								    <div class="col-sm-10">
								      <input type="password" class="form-control" id="inputPassword3" name="password1" required="required" placeholder="Password">
								    </div>
								  </div>
								  <div class="form-group">
								    <label for="inputEmail3" class="col-sm-2 control-label">Numri Personal</label>
								    <div class="col-sm-10">
								      <input type="number" class="form-control" id="inputEmail6" name="nrPersonal1" required="required" placeholder="Numri Personal">
								    </div>
								  </div>
								  <div class="form-group">
											<label class="col-md-2 control-label">Gjinia</label>
											<div class="col-md-10">
												<label class="radio radio-inline">
													<input name="gjinia1" value="M" type="radio">
													Mashkull </label>
												<label class="radio radio-inline">
													<input name="gjinia1" value="F" type="radio">
													Femer </label>
											</div>
										</div>
								  <div class="form-group">
								    <div class="col-sm-offset-2 col-sm-10">
								      <div class="checkbox">
								        <label>
								          <input type="checkbox" name="kryetari1" value="1"> Kryetar i Grupit
								        </label>
								    </div>
								  </div>
								  <div class="form-group">
								    <div class="col-sm-offset-2 col-sm-10">
								      <input type="submit" class="btn btn-primary" name="usBtn" value="Edito">
								    </div>
								  </div>
								</form>
                                        
  				</div>
  			</div>
		</div>
    </div>
        
    <script>
    
            var v0 = document.getElementById('id');
            var v1 = document.getElementById('emri');
            var v2 = document.getElementById('mbiemri');
            var v3 = document.getElementById('userName');
            var v4 = document.getElementById('nrPersonal');
            var v5 = document.getElementsByClassName('gjinija');
            var v6 = document.getElementById('kryetar');
            
            var tabelja = document.getElementById("example");
            var reshti;
            
            function indeksiReshtit(x)
            {
               reshti = x.rowIndex;
            }

            function reshtiTabele()
            {
                var x = tabelja.rows[reshti].cells.length;
                var z = [];
                for(var i=0;i<7;i++)
                {   
                    if(i!==5)
                    {
                        z[i] = tabelja.rows[reshti].cells[i].innerHTML;
                    }
                    else
                    {
                        if("M" === tabelja.rows[reshti].cells[i].innerHTML)
                        {
                            z[i] = tabelja.rows[reshti].cells[i].innerHTML;
                        }
                        else{
                            z[i] = tabelja.rows[reshti].cells[i].innerHTML;
                        }
                    }
                }
           
                v0.value = z[0];
                v1.value = z[1];
                v2.value = z[2];
                v3.value = z[3];
                v4.value = z[4];
                if(z[5] === "M")
                    v5[0].checked = true;
                else
                    v5[1].checked = true;
                v6.checked = z[6] === "Po"? true : false;
                
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
            $usBtn = filter_input(INPUT_POST, 'usBtn');
            
            
            if(isset($usBtn))
            {
                if($s->update($id1,$emri1, $mbiemri1, $userName1, $nrPersonal1, $gjinia1, $kryetari1))
                {
                    header("Refresh:0;");
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
                    header("Refresh:0;");
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
               Copyright 2014 <a href='#'>Website</a>
            </div>
            
         </div>
      </footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <script src="vendors/fullcalendar/fullcalendar.js"></script>
    <script src="vendors/fullcalendar/gcal.js"></script>
    <script src="js/custom.js"></script>
    <link href="vendors/datatables/dataTables.bootstrap.css" rel="stylesheet" media="screen">
    <script src="vendors/datatables/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables/dataTables.bootstrap.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/tables.js"></script>


  </body>
</html>
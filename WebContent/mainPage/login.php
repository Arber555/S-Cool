<!DOCTYPE html>
<html>
	<head>
		<title>login</title>
		<meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <link rel="stylesheet" href="css/login.css"/>
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	    <link rel="stylesheet" href="font/font awesome/css/font-awesome.min.css" />
	</head>
	<body>
    	<div class="container">
	    	<div id="loginbox" class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
	            <div class="panel panel-info" >
                	<div class="panel-heading">
                            <div class="panel-title">Sign In</div>
                        </div>     

                        <div class="panel-body" >
                            <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>    
                            <form action="login.php" method="post" id="loginform" class="form-horizontal" role="form">     
                                <div  class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input id="login-username" type="text" class="form-control" name="username"  placeholder="username">                                        
                                </div>   
                                <div  class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12 controls">
                                        <button type="submit" name ="login" id="btn-login" class="btn btn-success">Login  </button>
                                    </div>
                                </div>
                            </form>     
                	</div>                     
                    </div>  
	        </div>

	        <!--<div id="intro-wall">
    			<h2 id="intro-writing">Connect with students around your faculty</h2>
    		</div>-->
                <?php
                    spl_autoload_register(function ($class_name) {
                        include 'C:\xampp\htdocs\S-Cool\BL/'.$class_name . '.php';
                    });
                
                    $login = filter_input(INPUT_POST, 'login');
                    if(isset($login))
                    {
                        
                        $userNameField = filter_input(INPUT_POST, 'username');
                        $passwordField = filter_input(INPUT_POST, 'password');
                        $hash = Studenti::returnPassword($userNameField);
                        
                        if(password_verify($passwordField, $hash))
                        {
                            $sqlConnection = new SQLConnection();
                            $con = $sqlConnection->connection();

                            $sql = "SELECT * from studenti s WHERE s.UserName = '".$userNameField."'  and s.Password ='".$hash."'";

                            $result = mysqli_query($con, $sql);

                            if(mysqli_num_rows($result) > 0)
                            {
                                while($row = mysqli_fetch_assoc($result))
                                {
                                    session_start();
                                    $_SESSION['username'] = $row['UserName'];
                                    $_SESSION['emri'] = $row['Emri'];
                                    $_SESSION['mbiemri'] = $row['Mbiemri'];
                                    $_SESSION['btnLogin_status'] = true;
                                    header('Location: studentiProfile_2.php?un='.$row['UserName']);
                                }
                            }
                        }
                        else
                        {
                            echo "Account does not exist";
                        }
                    }
                    else 
                    {
                        echo 'Nuk o hi hiqq .';
                    }
                ?>
    	</div>
	</body>
</html>
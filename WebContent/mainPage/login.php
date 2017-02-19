<!DOCTYPE html>
<html>
	<head>
        <title>login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="css/login.css"/>
        <link rel="stylesheet" href="font/font awesome/css/font-awesome.min.css" />
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	</head>
	<body>
    	<div class="container">
            <h1>S-Cool</h1>
            <div id="loginbox" class="col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 col-xs-8 col-xs-offset-2">  
                <form action="login.php" method="post" id="loginform" class="form-horizontal" role="form">     
                    <input id="login-username" type="text" class="form-control" name="username"  placeholder="username">

                    <input id="login-password" type="password" class="form-control" name="password" placeholder="password">

                    <label class='radio radio-inline'>
                        <input name='stu' value='P' type='radio'>Profesor
                    </label>

                    <label class='radio radio-inline'>
                        <input name='stu' value='S' type='radio'>Student
                    </label>
                    <!--<label for="radio-1"> Profesor
                        <input class="a" type="radio" name="stu" value='P'>
                    </label>
                    <label for="radio-1"> Student
                        <input class="a" type="radio" name="stu" value='S'>
                    </label>-->
                    <button type="submit" name ="login" id="btn-login" class="btn btn-success">Login</button>
                </form>              
            </div> 

            <?php
                spl_autoload_register(function ($class_name) {
                    include 'C:\xampp\htdocs\S-Cool\BL/'.$class_name . '.php';
                });
            
                $login = filter_input(INPUT_POST, 'login');
                $prof = filter_input(INPUT_POST, 'prof');
                $stu = filter_input(INPUT_POST, 'stu');
                
                if(isset($login))
                {
                    if(filter_input(INPUT_POST, 'username') == "Admin" && filter_input(INPUT_POST, 'password') === "Admin")
                    {
                         header('Location: ../../WebContent/adminPage/index.php');
                    }
                    else
                    {
                        if($stu === "S")
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
                                        $_SESSION['ID'] = $row['ID'];
                                        $_SESSION['username'] = $row['UserName'];
                                        $_SESSION['emri'] = $row['Emri'];
                                        $_SESSION['mbiemri'] = $row['Mbiemri'];
                                        $_SESSION['btnLogin_status'] = true;
                                        $_SESSION['isStudent'] = true;
                                        $_SESSION['Kryetar'] = $row['Kryetar'];

                                        /*if($row['Kryetar'] == 1)
                                        {
                                            echo "Hini";
                                        }
                                        else
                                        {
                                            echo "sosht";
                                        }*/

                                        header('Location: index.php?un='.$_SESSION['username']);
                                    }
                                }
                            }
                            else
                            {
                                echo "Student does not exist";
                            }
                        }
                        else
                        {
                            $userNameField = filter_input(INPUT_POST, 'username');
                            $passwordField = filter_input(INPUT_POST, 'password');
                            $hash = Profesori::returnPassword($userNameField);

                            if(password_verify($passwordField, $hash))
                            {
                                $sqlConnection = new SQLConnection();
                                $con = $sqlConnection->connection();

                                $sql = "SELECT * from profesori s WHERE s.UserName = '".$userNameField."'  and s.Password ='".$hash."'";

                                $result = mysqli_query($con, $sql);

                                if(mysqli_num_rows($result) > 0)
                                {
                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                        session_start();
                                        $_SESSION['ID'] = $row['ID'];
                                        $_SESSION['username'] = $row['UserName'];
                                        $_SESSION['emri'] = $row['Emri'];
                                        $_SESSION['mbiemri'] = $row['Mbiemri'];
                                        $_SESSION['btnLogin_status'] = true;
                                        $_SESSION['isStudent'] = false;
                                        header('Location: index.php?un='.$_SESSION['username']);
                                    }
                                }
                            }
                            else
                            {
                                echo "Proffessor does not exist ".$hash;
                            }
                        }
                    }
                }
            ?>
    	</div>
    </body>
</html>


    <?php
        session_start();
        $thisPage = "index.php?un=".$_SESSION['username'];
        
        if($_SESSION['isStudent'] == true)
        {
            $profilePage = "studentiProfile_2.php?un=".$_SESSION['username'];
        }
        else
        {
            $profilePage = "professorProfile_1.php?un=".$_SESSION['username'];
        }
    ?>
    
    <div class="navbar navbar-default navbar-fixed-top" id="header">
        <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">S-Cool</a>
            </div>
            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav navbar-right">
                  <li class="active"><a href="<?php echo $thisPage; ?>">Home</a></li>
                <li><a href="#">Messages <span class="badge">3</span></a></li>
                <li><a href="#">Notifications <span class="badge">7</span></a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" role="button" href="#" aria-haspopup="true" aria-expanded="false">Profile<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo $profilePage; ?>">My Profile</a></li>
                        <li><a href="#">Settings</a></li>
                        <li class="divider"></li>
                        <li><a href='logout.php'>Logout</a></li>
                    </ul>
                </li>
              </ul>

                <form class="navbar-form" method="post" action="index.php">
                <div class="form-group" style="display:inline;">
                  <div class="input-group col-md-4">
                    <input class="form-control" name="search" placeholder="Search" type="text">
                    <span class="input-group-addon" style="width: 1%;"><button type="submit" name="submit"><span class="glyphicon glyphicon-search"></span></button></span>
                    <!--<input  type="text" name="name"> 
                    <input  type="submit" name="submit" value="Search"> -->
                  </div>
                </div>
              </form>
                
            <?php
                

                $usBtn = filter_input(INPUT_POST, 'submit');
                $name = filter_input(INPUT_POST, 'search');
                if(isset($usBtn))
                {
                    //Studenti::findByEmriAndMbiemri($name);
                    header("location: RezultatetESearch.php?un=".$_SESSION['username']."&search=".$name);
                }
            ?>
            </div><!-- end of nav-collapse -->
        </div>
    </div>


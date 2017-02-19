    <?php
        session_start();
        $thisPage = "index.php?un=".$_SESSION['username'];
        
        spl_autoload_register(function ($class_name) {
            include 'C:\xampp\htdocs\S-Cool\BL/'.$class_name . '.php';
        });
        
        $notification = null;
        if($_SESSION['isStudent'] == true)
        {
            $profilePage = "studentiProfile_2.php?un=".$_SESSION['username'];
            $notification = Notification::returnPostProfi($_SESSION['ID']);
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
                <li><a href="<?php echo $thisPage; ?>">Home</a></li>
                <?php
                    if($_SESSION['isStudent'])
                    {
                ?>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" role="button" href="#" aria-haspopup="true" aria-expanded="false">Notifications <span class="badge"><?php echo $notification[0]!=null?$notification[0]:""; ?></span></a>
                    <ul class="dropdown-menu">
                        <?php
                                $teksti = $notification[1];
                                $emrat = $notification[2];
                                for($t = count($teksti)-1; $t>=0 ; $t--)
                                {
                                    echo "<li class='notification-posts'>"
                                            ."<div class='notification-post'>"
                                                ."<img src='img/user.png'/>"
                                                ."<h6>".$emrat[$t]."</h6>"
                                                ."<p>Shtoi nje shkrim te ri: ".$teksti[$t]."</p>"
                                            ."</div>"
                                        ."</li>";
                                }
                                echo "</ul>";
                            }


                        ?>

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" role="button" href="#" aria-haspopup="true" aria-expanded="false">Profile<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo $profilePage; ?>">My Profile</a></li>
                        <li class="divider"></li>
                        <li><a href='logout.php'>Logout</a></li>
                    </ul>
                </li>
            </ul>

            <form class="navbar-form" method="post" action="headerBar.php">
                <div class="form-group">
                    <input class="form-control" name="search" placeholder="Search" type="text">
                    <button type="submit" name="submit" class="btn btn-default">Search</button>
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


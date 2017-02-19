<!DOCTYPE html>
<html>
    <head>
        <title>Search-Results</title>      

        <?php
            include "headd.php";

            $name =filter_input(INPUT_GET, 'search');
            $studentet = Studenti::findByEmriAndMbiemri($name);
            $profesoret = Profesori::findByEmriAndMbiemri($name);
        ?>

        <link rel="stylesheet" href="css/rezultatet.css">
    </head>

    <body>
        <?php include "headerbar.php"; ?>

        <div class="row">
            <div id="searchResults" class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">

            <?php
                if(count($profesoret) > 0)
                {
                    for($i = 0 ; $i < count($profesoret) ; $i++)
                    {
                        $row = $profesoret[$i];
                        $u = $row['UserName'];
                        $ppage = "professorProfileVisit.php?un=".$u;
                        $fotoMirProf = "/../S-Cool/foto/".Foto::getFotoP($row['ID']);
                        $fff = "/../S-Cool/WebContent/mainPage/img/user.png";
                        $rezultati = Foto::getIdP($row['ID'])? $fotoMirProf: $fff;
            ?>
                    <div class="row">
                        <div id="flex" class="col-lg-5 col-md-5 col-sm-5">
                            <img id="profileImage" class="img-circle" src="<?php echo $rezultati; ?>">
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-7">
                            <a id="name" href="<?php echo $ppage; ?>"><?php echo $row['Emri'] ." ". $row['Mbiemri']; ?></a>
                            <h4>Profesor</h4>
                        </div>
                    </div>

            <?php
                    }
                }

                if(count($studentet) > 0)
                {
                    for($i = 0 ; $i < count($studentet) ; $i++)
                    {
                        $row = $studentet[$i];
                        $u2 = $row['UserName'];
                        $spage = "studentProfileVisit.php?un=".$u2;
                        $fotoMirStu = "/../S-Cool/foto/".Foto::getFotoS($row['ID']);
                        $fff = "/../S-Cool/WebContent/mainPage/img/user.png";
                        $rezultati2 = Foto::getIdS($row['ID'])? $fotoMirStu: $fff;
            ?>

                    <div class="row">
                        <div id="flex" class="col-lg-5 col-md-5 col-sm-5">
                            <img id="profileImage" class="img-circle" src="<?php echo $rezultati2; ?>">
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-7">
                            <a id="name" href="<?php echo $spage; ?>"><?php echo $row['Emri'] ." ". $row['Mbiemri']; ?></a>
                            <h4>Student</h4>
                        </div>
                    </div>

            <?php
                    }
                }
            ?>
            </div><!-- searchResults -->
        </div><!-- row -->
    </body>
</html>
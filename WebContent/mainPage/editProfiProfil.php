<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
         <form class="form-horizontal" role="form" action="profesoret.php" method="post">
            <div class="form-group">
                <label for="idStudentit" class="col-sm-3 control-label">ID</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="id1" name="id1" required="required" placeholder="Id e profesorit" readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="emriProfesorit" class="col-sm-3 control-label">Emri</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="emri1" id="emri1" required="required" placeholder="Emri i profesorit">
                </div>
            </div>
            <div class="form-group">
                <label for="mbiemriProfesorit" class="col-sm-3 control-label">Mbiemri</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="mbiemri1" id="mbiemri1" required="required" placeholder="Mbiemri i profesorit">
                </div>
            </div>
            <div class="form-group">
                <label for="usernameProfesorit" class="col-sm-3 control-label">Username</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="userName1" id="userName1" required="required" placeholder="Username">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <input type="submit" class="btn btn-primary" name="usBtn" value="Edito">
                </div>
            </div>
        </form>
        
        <?php
            
        ?>
       
    </body>
</html>

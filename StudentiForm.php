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
            
            
            /* The Modal (background) */
            .modal {
                display: none; /* Hidden by default */
                position: fixed; /* Stay in place */
                z-index: 1; /* Sit on top */
                padding-top: 100px; /* Location of the box */
                left: 0;
                top: 0;
                width: 100%; /* Full width */
                height: 100%; /* Full height */
                overflow: auto; /* Enable scroll if needed */
                background-color: rgb(0,0,0); /* Fallback color */
                background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
            }

            /* Modal Content */
            .modal-content {
                position: relative;
                background-color: #fefefe;
                margin: auto;
                padding: 0;
                border: 1px solid #888;
                width: 80%;
                box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
                -webkit-animation-name: animatetop;
                -webkit-animation-duration: 0.4s;
                animation-name: animatetop;
                animation-duration: 0.4s
            }

            /* Add Animation */
            @-webkit-keyframes animatetop {
                from {top:-300px; opacity:0} 
                to {top:0; opacity:1}
            }

            @keyframes animatetop {
                from {top:-300px; opacity:0}
                to {top:0; opacity:1}
            }

            /* The Close Button */
            .close {
                color: white;
                float: right;
                font-size: 28px;
                font-weight: bold;
            }

            .close:hover,
            .close:focus {
                color: #000;
                text-decoration: none;
                cursor: pointer;
            }

            .modal-header {
                padding: 2px 16px;
                background-color: #5cb85c;
                color: white;
            }
        </style>
    </head>
    <body>
        <h1>Shtimi i Studentve</h1>
        <form action="StudentiForm.php" method="post">
            <label>Emri:</label> <input type="text" name="emri" required="required"><br/>
            <label>Mbiemri:</label> <input type="text" name="mbiemri" required="required"><br/>
            <label>UserName:</label> <input type="text" name="userName" required="required"><br/>
            <label>Fjalkalimi:</label> <input type="password" name="password" required="required"><br/>
            <label>Nr Personal:</label> <input type="number" name="nrPersonal" required="required"><br/>
            <label class="required"> Gjinia:</label>
				<input type="radio" name="gjinia" value="M"/><label>Mashkull</label>
				<input type="radio" name="gjinia" value="F"/><label>Femer</label><br/>
            <label>Kryetar:</label> <input type="checkbox" name="kryetari" value="1"><br/>
            <input type="submit" value="Regjistro" name="RsBtn">
        </form>
        <?php
            spl_autoload_register(function ($class_name) {
                include 'BL/'.$class_name . '.php';
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
        <br/>
        <br/>
        <br/>
        <br/>
        
        <table>
            <tr>
                <th>ID</th>
                <th>Emri</th>
                <th>Mbiemri</th>
                <th>UserName</th>
                <th>Nr_Personal</th>
                <th> Gjinia</th>
                <th>Kryetar</th>
            </tr>
            <?php
                $s->selectAll();
            ?>
        </table>
        
        <hr>
        <hr>
        <hr>
        <hr>
        <hr>
        <hr>
        
        <h1>Editimi i Studentve</h1>
        
         <table id="tabelja">
            <tr>
                <th>ID</th>
                <th>Emri</th>
                <th>Mbiemri</th>
                <th>UserName</th>
                <th>Nr_Personal</th>
                <th>Gjinia</th>
                <th>Kryetar</th>
            </tr>
            <?php
                $s->selectAll();
            ?>
        </table>
        
        <button onclick="reshtiTabele()">Edito Studentin</button>
        
        <form action="StudentiForm.php" method="post">
            <label>ID:</label> <input type="text" name="id1" required="required" id="id" readonly><br/>
            <label>Emri:</label> <input type="text" name="emri1" required="required" id="emri"><br/>
            <label>Mbiemri:</label> <input type="text" name="mbiemri1" required="required" id="mbiemri"><br/>
            <label>UserName:</label> <input type="text" name="userName1" required="required" id="userName"><br/>
            <!--<label>Fjalkalimi:</label> <input type="password" name="password" required="required" id="fjalkalimi"><br/>-->
            <label>Nr Personal:</label> <input type="number" name="nrPersonal1" required="required" id="nrPersonal"><br/>
            <label class="required"> Gjinia:</label>
				<input type="radio" name="gjinia1" value="M" class="gjinija"/><label>Mashkull</label>
				<input type="radio" name="gjinia1" value="F" class="gjinija"/><label>Femer</label><br/>
            <label>Kryetar:</label> <input type="checkbox" name="kryetari1" value="1" id="kryetar"><br/>
            <input type="submit" value="Edito" name="usBtn" id="usBtn">
        </form>
        
        <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
              <div class="modal-header">
                <span class="close">×</span>
                <h2>U editua Studenti!</h2>
              </div>
            </div>

        </div>
        
        <script>
            //var v = [document.getElementById('emri'), document.getElementById('mbiemri'), document.getElementById('userName'), document.getElementById('nrPersonal'), document.getElementById('kryetar')];
            var v0 = document.getElementById('id');
            var v1 = document.getElementById('emri');
            var v2 = document.getElementById('mbiemri');
            var v3 = document.getElementById('userName');
            var v4 = document.getElementById('nrPersonal');
            var v5 = document.getElementsByClassName('gjinija');
            var v6 = document.getElementById('kryetar');
            
            var tabelja = document.getElementById("tabelja");
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
                    //header("Refresh:0;");
                    Echo "<h3>U editua Studenti</h3>";
                }
                else
                {
                    Echo "<h3>Nuk u editua Studenti</h3>";
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
        <script>
            // Get the modal
            var modal = document.getElementById('myModal');

            // Get the button that opens the modal
            var btn = document.getElementById("usBtn");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks the button, open the modal 
            btn.onclick = function() {
                modal.style.display = "block";
            };

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                modal.style.display = "none";
                //window.location.reload();
            };

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target === modal) {
                    modal.style.display = "none";
                    //window.location.reload();
                }
            };
        </script>
    </body>
</html>

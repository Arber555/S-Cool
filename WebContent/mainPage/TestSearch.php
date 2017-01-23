	<html> 
	  <head> 
	    <meta  http-equiv="Content-Type" content="text/html;  charset=iso-8859-1"> 
	    <title>Search  Contacts</title> 
	  </head> 
	  <p><body> 
	    <h3>Search  Contacts Details</h3> 
	    <p>You  may search either by first or last name</p> 
            <form  method="post" action="TestSearch.php"  id="searchform"> 
	      <input  type="text" name="name"> 
              <input id="aa" type="submit" name="submit" value="Search"> 
	    </form> 
	  </body> 
	</html> 
        
       
        
        <?php
            spl_autoload_register(function ($class_name) {
                include 'C:\xampp\htdocs\S-Cool\BL/'.$class_name . '.php';
            });
        
            $usBtn = filter_input(INPUT_POST, 'submit');
            $name = filter_input(INPUT_POST, 'name');
            if(isset($usBtn))
            {
                Studenti::findByEmriAndMbiemri($name);
            }
        ?>
<?php
include "headd.php";;
include "headerBar.php";

spl_autoload_register(function ($class_name) {
    include 'C:\xampp\htdocs\S-Cool\BL/'.$class_name . '.php';
});

$name =filter_input(INPUT_GET, 'search');
echo "<p id='a'></p>";
$studentet = Studenti::findByEmriAndMbiemri($name);
$profesoret = Profesori::findByEmriAndMbiemri($name);




if(count($profesoret) > 0)
{
    for($i = 0 ; $i < count($profesoret) ; $i++)
    {
        $row = $profesoret[$i];
        $u = $row['UserName'];
        $ppage = "professorProfileVisit.php?un=".$u;
        ?>
        <a href="<?php echo $ppage; ?>"><tr>
            <td><?php echo $row['Emri']; ?></td>
            <td><?php echo $row['Mbiemri']; ?></td>
        </tr></a><br>

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
        ?>
        <a href="<?php echo $spage; ?>"><tr>
            <td><?php echo $row['Emri']; ?></td>
            <td><?php echo $row['Mbiemri']; ?></td>
        </tr></a><br>

        <?php
    }
}
?>
<style>
    #a{
        margin-top: 80px;
    }
</style>
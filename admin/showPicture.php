<?php 
try
{

include '../api/bdd.php';
include '../api/fonctionsAdmin.php';
include 'verifAdmin.php';

$base64=getImageToDisplay($_GET['idE'], $_GET['t'],$dbh);
?>
<center>
<img src="data:image/png;base64,<?php echo $base64;?>" width="1000px">
</center>
<?php
} catch (Exception $e) 
{
    echo 'Exception : ',  $e->getMessage(), "\n";
}
?>
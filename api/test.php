<?php
$nomFichierFinal = $_POST['nomMontage'].".jpg";
$current = file_get_contents($_FILES['image']['tmp_name']);
$result=file_put_contents($nomFichierFinal, $current);
echo "Résultat :".$result;
?>
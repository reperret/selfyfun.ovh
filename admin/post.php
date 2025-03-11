<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Titre de la page</title>
       <script
  src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
  integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
  crossorigin="anonymous"></script>
    
    <script>
    
function save()
{
    $('#nouveau').val($('#ancien').val());
    $('#form').submit();
}


    </script>
</head>
<body>
    <form id="test" name="test" action="post.php" method="POST">
    <input type="text" name="ancien" id="ancien">
    <input type="hidden" name="nouveau" id="nouveau">
        <button type="submit" onclick="save()">GO</button>
    </form>
    
    <?php echo $_POST['ancien']; ?>
    <br>
     <?php echo $_POST['nouveau']; ?>
</body>
</html>
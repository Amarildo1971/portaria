<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	
<title>PORTARIA </title>
	  
</head>
 <?php 
  date_default_timezone_set('America/Sao_Paulo');
   $id = $_POST['input_id'];
    $connect = mysqli_connect('localhost','root','','portaria');	
     $query = "delete from visitantes where id = '$id'";
      mysqli_query($connect,$query);
      mysqli_close($connect);
echo "<script language='javascript' type='text/javascript'>alert('registro apagado');window.location.href='index.php'</script>";
?>
</html>
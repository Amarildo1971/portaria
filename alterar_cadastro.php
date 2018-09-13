<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	
<title>PORTARIA </title>
	  
</head>
<?php 
date_default_timezone_set('America/Sao_Paulo');
$nome= $_POST['nome'];
$rg= $_POST['rg'];
$foto = $_POST['input_foto'];
$identificador= $_POST['identificador'];
$email= $_POST['email'];
$endereco= $_POST['endereco'];
$telefone= $_POST['telefone'];
$bairro= $_POST['bairro'];
$cidade= $_POST['cidade'];
$estado= $_POST['estado'];
$empresa= $_POST['empresa'];
$placa = $_POST['placa'];
$data_cadastro = date("Y-m-d");
$obs= $_POST['obs'];
$id = $_POST['input_id'];
$connect = mysqli_connect('localhost','root','','portaria');
//$query_select = "SELECT rg FROM visitantes WHERE rg = '$rg'";
//$select = mysqli_query($connect,$query_select);
//$array = mysqli_fetch_array($select);
//$logarray = $array['rg'];
 
 
       $query = "UPDATE  visitantes  SET nome='$nome',identificador='$identificador',rg='$rg',foto='$foto',
   telefone='$telefone',email='$email',endereco='$email',bairro='$bairro',cidade='$cidade',
  estado='$estado',empresa='$empresa',placa='$placa',obs='$obs' where id = '$id'";
      $insert = mysqli_query($connect,$query);
         
        if($insert){
          echo"<script language='javascript' type='text/javascript'>alert('Cadastrado com sucesso!');window.location.href='index.php'</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>alert('N\u00e3o foi possível cadastrar esse usu&acute;rio');window.location.href='cadastro_visitantes.html'</script>";
        }
   
mysqli_close($connect);
?>
</html>
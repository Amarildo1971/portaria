<?php
date_default_timezone_set('America/Sao_Paulo');
$chave = $_POST['chave'];
$es = $_POST['es'];
$autorizado = $_POST['autorizado'];
$connect = mysqli_connect('localhost','root','','portaria');
    mysqli_set_charset($connect,'utf8');
$query_select = "SELECT * FROM visitantes WHERE rg = '$chave' or identificador = '$chave'";
$select = mysqli_query($connect,$query_select);
$array = mysqli_fetch_array($select);
$nome = $array['nome'];
$rg = $array['rg'];
$foto = $array['foto'];
$data = date("Y-m-d");
$hora = date("H:i");
echo $chave;
echo $autorizado;
echo $es;
echo $foto;
echo $nome; 
   if($array == "" || $array == null){
       echo"<script language='javascript' type='text/javascript'>alert('Registro n\u00e3o encontrado');</script>";
    }else {
$query = "INSERT INTO acessos (rg,foto,nome,data,hora,autorizado,dentro_fora)
 VALUES ('$rg','$foto','$nome','$data','$hora','$autorizado','$es')";
      mysqli_query($connect,$query);
}
echo "<script language='javascript' type='text/javascript'>window.location.href='index.php'</script>";

?>
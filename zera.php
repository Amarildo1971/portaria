<?php
if (isset($_GET['tabela'])){
$tabela = $_GET['tabela'];
$connect = mysqli_connect('localhost','root','','portaria');
  $consulta = "truncate table ".$tabela;
     mysqli_query($connect,$consulta);
                         echo $consulta;
}else{
echo "Nada feito";
}

?>
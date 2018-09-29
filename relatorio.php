<!DOCTYPE html>
<html>

    <head>

        <title>Easy Access</title>

        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="css/estilo.css">
      <script type="text/javascript">
         function printe(){
          document.getElementById('btn_print').style.display = 'none';
           document.getElementById('link_voltar').style.display = 'none';
          window.print();
                          }    
                               </script>
       </head>

    <body>

<?php
$pessoa = $_POST['pessoa'];
$data_inicial = $_POST['data_inicio'];
$data_final = $_POST['data_fim'];
?>

<div><h1>Relat&oacute;rio de acessos</h1></div>
<div style="text-align: left;padding-left: 100px;"> Per&iacute;odo:<strong> <?php echo $data_inicial; ?></strong> &aacute;  <strong><?php echo $data_final; ?></strong></div>
<div style="padding: 10px;width: 100%;">
<table>
   <tr>
     <th>DATA</th>
       <th>HORA</th>
         <th>NOME</th>
           <th>DESCRI&Ccedil;&Atilde;O</th>
            <th>AUTORIZADO POR:</th>
      </tr>
<?php
 date_default_timezone_set('America/Sao_Paulo');
              $connect = mysqli_connect('localhost','root','','portaria');
           mysqli_set_charset($connect,'utf8');
                $query_select = "SELECT * FROM acessos where nome like '$pessoa%' or rg = '$pessoa' or identificador ='$pessoa' and data between '$data_inicial' and 'data_final'";
                     $select = mysqli_query($connect,$query_select);  
                      while($valor = mysqli_fetch_assoc($select)){
        $data_dia = substr($valor['data'],8,2);
          $data_mes = substr($valor['data'],5,2);
            $data_ano = substr($valor['data'],0,4);
              $hora = $valor['hora']; 
                $foto = $valor['foto']; 
       echo "<tr>";  
            echo "<td>".$data_dia."/".$data_mes."/".$data_ano."</td>";
               echo "<td>".$hora."</td>";
              echo "<td>".$valor['nome']."</td>";
                   echo "<td>".$valor['dentro_fora']."</td>";	
                     echo "<td>".$valor['autorizado']."</td>";
                echo "</tr>";  
}
        mysqli_close($connect);
          ?>        	
</table>
</div>
<center><input type="button" id="btn_print" value="Imprimir" onClick="printe();"</center>
<a href="index.php" id="link_voltar">Voltar</a>
</body></html>
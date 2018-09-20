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
          window.print();
                          }    
                               </script>
       </head>

    <body>

<?php
$data_inicial = $_POST['data_inicio'];
$data_final = $_POST['data_fim'];
?>

<div><h1>Relat&oacute;rio de acessos</h1></div>
<div style="margin: 0 auto;width: 85%;border-top: 1px solid #323232;">
<table cellspacing="10">
   <tr>
    <th>Imagem</th>
     <th>DATA</th>
       <th>HORA</th>
         <th>NOME</th>
           <th>DESCRI&Ccedil;&Atilde;O</th>
            <th>AUTORIZA&Ccedil;&Atilde;O</th>
      </tr>
<?php
 date_default_timezone_set('America/Sao_Paulo');
              $connect = mysqli_connect('localhost','root','','portaria');
           mysqli_set_charset($connect,'utf8');
                $query_select = "SELECT * FROM acessos where data between '$data_inicial' and '$data_final'";
                     $select = mysqli_query($connect,$query_select);  
                      while($valor = mysqli_fetch_assoc($select)){
        $data_dia = substr($valor['data'],8,2);
          $data_mes = substr($valor['data'],5,2);
            $data_ano = substr($valor['data'],0,4);
              $hora = $valor['hora']; 
                $foto = $valor['foto']; 
       echo "<tr>";  
         echo "<td><img src='".$foto."' width=60 height=70></td>";
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
<div style="text-align: right;padding-right: 10px;"> Per&iacute;odo: <?php echo $data_inicial; ?> &aacute;  <?php echo $data_final; ?></div>
<center><input type="button" id="btn_print" value="Imprimir" onClick="printe();"</center>
</body></html>
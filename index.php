<!DOCTYPE html>
<html>

    <head>

        <title>Easy Access</title>

        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width">

        <meta http-equiv="refresh" content="60">
        <link rel="stylesheet" href="css/estilo.css">
           </head>

    <body>


 <div id="container">  
   <div id="header">
      <div id="mainnav">
           <ul>  			
		<li><a href="index.php">In&iacute;cio</a></li>
                <li><a href="cadastro_visitantes.html">Cadastrar visitante</a></li>  			
		 					
	    </ul>  	
       </div>
      </div>
   <div id="flex_container">
     <div style="margin-left: 10px;border-left: 1px solid #0489b1;padding:  0 0 0 10px;">
   <form method="POST" action="es.php" id="form_es">
      <label for="identificador"><strong>Entrada / Sa&iacute;da: </strong></label><input type="text" name="chave" id="chave" placeholder="rg ou identificador" required />
        <select name="es">    
           <option>
             Entrada
               </option>
                 <option>
                Saida
            </option>
                   </select>     
             <input type="text" name="autorizado" placeholder="Quem autorizou?" required />
           <input type="submit" value="Registrar" id="input_es" name="alterar" />
         </form>   
      </div>
<div style="margin-left:10px;padding:0 0 0 10px;border-left: 1px solid #0489b1;">
     <form action="procura_cadastro.php" method="get" id="form_busca">
       <label for="chave"><strong>Procurar cadastro:</strong></label><input type="text" name="chave" placeholder="Nome,Rg ou identificador" required /><input type="submit" value="Procurar Cadastro">
          </form>
            </div>
<div style="margin-left:10px;padding:0 0 0 10px;border-left: 1px solid #0489b1;">
     <form action="relatorio.php" method="post" id="form_relat" target="_blank">
       <label for="data"><strong>Gerar relat&oacute;rio</strong></label><input type="date" name="data_inicio" required />
          <input type="date" name="data_fim" required /> 
          <input type="submit" value="Gerar relat&oacute;rio">
          </form>
            </div>

               </div><!---end_container-->
<div style="overflow: scroll;">
<fieldset style="min-height:250px;"><legend>&Uacute;ltimos acessos:</legend>
 <?php
 date_default_timezone_set('America/Sao_Paulo');
              $connect = mysqli_connect('localhost','root','','portaria');
           mysqli_set_charset($connect,'utf8');
                $query_select = "SELECT * FROM acessos order by data DESC limit 4";
                     $select = mysqli_query($connect,$query_select);
        while($valor = mysqli_fetch_assoc($select)){
        $data_dia = substr($valor['data'],8,2);
          $data_mes = substr($valor['data'],5,2);
            $data_ano = substr($valor['data'],0,4);
              $hora = $valor['hora']; 
                $foto = $valor['foto']; 
        echo "<a href='".$foto."' target='_blank'><img id='acesso_foto' width='70' height='90' src='".$foto."' onError=this.onerror=null;this.src='imagens/imagem.jpg';></a>";
           echo "<span id='span_acesso'>";  
            echo $data_dia."/".$data_mes."/".$data_ano."&nbsp;&nbsp;".$hora;
              echo "&nbsp;&nbsp;".$valor['nome'];
                   echo "&nbsp;&nbsp;[ ".$valor['dentro_fora']." ]";	
                echo "<br />";  
                  echo "</span>";      
      }
        mysqli_close($connect);
          ?>        	

  </fieldset>
   </div>
   </div>        
  
</body>
</html>








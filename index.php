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
                 <li><a href="bkp.php">Fazer backup</a></li>	
                 <li><a href="ajuda.html">Ajuda</a></li>
<li><span onClick="document.getElementById('div_es').style.display = 'block';">jgggu</span></li>
		 					
	    </ul>  	
       </div>
      </div>
     <div id="div_es">
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
             <input type="text" name="bloco" placeholder="Bloco" required />
             <input type="text" name="apto" placeholder="Apartamento" required />
            <input type="text" name="autorizado" placeholder="Quem autorizou?" required />
           <input type="submit" value="Registrar entrada/sa&iacute;da" id="input_es" name="btn_es" onClick="document.getElementById('div_es').style.display ='none';"  />
         </form>   
      </div>
   <div id="flex_container">

<div style="margin-left:5px;padding:0 10px 0 10px;border: 2px solid #0489b1;border-radius: 5px;">
     <form action="procura_cadastro.php" method="post" id="form_busca">
       <label for="chave"><strong>Procurar cadastro:</strong></label><input type="text" name="chave" placeholder="Nome,Rg ou identificador" required /><input type="submit" value="Procurar Cadastro">
          </form>
            </div>
<div style="margin-left:5px;padding:0 10px 0 10px;border: 2px solid #0489b1;border-radius: 5px;">
     <form action="relatorio.php" method="post" id="form_relat">
       <label for="data_inicio"><strong>Gerar relat&oacute;rio</strong></label>
        <input type="date" name="data_inicio" required />
          <input type="date" name="data_fim" required /> 
           <input type="submit" value="Gerar relat&oacute;rio">
          </form>
            </div>

               </div><!---end_container-->
<h2>&Uacute;ltimos acessos</h2>
         <div style="display: flex;flex-direction: column;width: 95%;">
<table>
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
                      echo "<tr><td><a href='".$foto."' target='_blank'><img id='acesso_foto' width='70' height='90' src='".$foto."' onError=this.onerror=null;this.src='imagens/imagem.jpg';></a></td>";  
                 echo "<td>".$data_dia."/".$data_mes."/".$data_ano."</td><td>".$hora."</td>";
              echo "<td>".$valor['nome']."</td>";
             echo "<td>Bloco:".$valor['bloco']."</td>";
            echo "<td>Apto:".$valor['apto']."</td>";
            echo "<td>".$valor['dentro_fora']."</td>";	     
         echo "</tr>";                                                    }
        mysqli_close($connect);
          ?> 
</table>    
         </div>
</body>
</html>








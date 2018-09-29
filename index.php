<!DOCTYPE html>
<html>

    <head>

        <title>Easy Access</title>

        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="css/estilo.css">
         <script language="Javascript">
           function verifica_saida(){
              if (document.form_es.es.options.selectedIndex == 1){
                                document.getElementById('btn_es').disabled = false;
                                            }else if(document.form_es.es.options.selectedIndex == 2){
                                               document.getElementById('btn_es').disabled = false;
                                              }else{
                                               document.getElementById('btn_es').disabled = true;    
                                               }
                   }
             </script>
           </head>

    <body>

  
   <div id="header">
      <div id="mainnav">
           <ul>  			
		<li><a href="index.php">In&iacute;cio</a></li>
                <li><a href="cadastro_visitantes.html">Cadastrar visitante</a></li>  
                <li><a href="cadastro_moradores.html">Cadastrar Morador</a></li>	
                 <li><a href="bkp.php">Fazer backup</a></li>	
                  <li>&copy;2018 - WinAccess V1.2</li>		 					
	    </ul>  	
         </div>
       </div>
 <div class="div_botoes">
  <button type="button" class="btn_submit" onClick="document.getElementById('div_es').style.display = 'block';">Registrar entrada/sa&iacute;da</button>
   <button type="button" class="btn_submit" onClick="document.getElementById('div_procura').style.display = 'block';">Procurar um cadastro</button>
    <button type="button" class="btn_submit" onClick="document.getElementById('div_relat').style.display = 'block';">Gerar Relat&oacute;rio</button>
   </div>
     <div id="div_es" class="div_central">
   <form method="POST" action="es.php" name="form_es">
   <span style="float: right;cursor: pointer;" onclick="document.getElementById('div_es').style.display ='none';">(X)</span>
      <label for="identificador"><strong>Entrada / Sa&iacute;da: </strong></label><input type="text" name="chave" id="chave" placeholder="rg ou identificador" required />
        <select name="es" onchange="verifica_saida();">    
           <option>Escolha</option>
             <option>Entrou</option>
                 <option>Saiu</option>
                   </select>     
             <input type="text" name="bloco" id="input_bloco" placeholder="Bloco" required />
             <input type="text" name="apto" id="input_apto" placeholder="Apartamento" required />
            <input type="text" name="autorizado" id="input_aut" placeholder="Quem autorizou?" required />
           <input type="submit" value="Registrar entrada/sa&iacute;da" id="btn_es" name="btn_es" disabled />
         </form>   
      </div>

<div id="div_procura" class="div_central">
      <span style="float: right;cursor: pointer;" onclick="document.getElementById('div_procura').style.display ='none';">(X)</span>
     <form action="procura_cadastro.php" method="post" id="form_busca">
       <label for="chave"><strong>Procurar cadastro:</strong></label><input type="text" name="chave" placeholder="Nome,Rg ou identificador" required /><input type="submit" value="Procurar Cadastro">
          </form>
            </div>
<div id="div_relat" class="div_central">
      <span style="float: right;cursor: pointer;" onclick="document.getElementById('div_relat').style.display ='none';">(X)</span>
     <form action="relatorio.php" method="post" id="form_relat">
       <label for="data_inicio"><strong>Gerar relat&oacute;rio</strong></label>
        <input type="date" name="data_inicio" required />
          <input type="date" name="data_fim" required /> 
          <input type="text" id="input_relat" name="pessoa" placeholder="Nome (deixar em branco para todos)">
           <input type="submit" value="Gerar relat&oacute;rio">
          </form>
            </div>

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








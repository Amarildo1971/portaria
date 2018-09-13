<!DOCTYPE html>

<html>

    <head>

        <title>Easy Access</title>

        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="css/estilo.css">
         <script type="text/javascript" src="scripts/webcam.js"></script>

          <script type="text/javascript" src="scripts/jquery.min.js"></script>
           <script type="text/javascript" src="scripts/script_upload.js"></script>
         <script type="text/javascript">

            //Configurando o arquivo que vai receber a imagem

            webcam.set_api_url('upload.php');


            //Setando a qualidade da imagem (1 - 100)

            webcam.set_quality(90);


            //Habilitando o som de click

            webcam.set_shutter_sound(true);


            //Definindo a função que será chamada após o termino do processo

            webcam.set_hook('onComplete', 'my_completion_handler');


            //Função para tirar snapshot

            function take_snapshot() {

                document.getElementById('foto_resultado').innerHTML = '<h1>Uploading...</h1>';

                webcam.snap();

            }


            //Função callback que será chamada após o final do processo

            function my_completion_handler(msg) {

                if (msg.match(/(http\:\/\/\S+)/)) {

                   // var htmlResult = '<h1>Upload Successful!</h1>';

                    htmlResult = '<img id="img_foto" src="'+msg+'" />';

                    document.getElementById('foto_resultado').innerHTML = htmlResult;

                     document.getElementById('input_foto').value = msg;
                    webcam.reset();

                }
                else {

                    alert("PHP Erro: " + msg);

                }

            }

                   function habilita_edicao() {
                     document.getElementById('btn_foto').disabled = false;
                        document.getElementById('btn_carregar').disabled = false;
                         document.getElementById('btn_alterar').disabled = false;
                           document.getElementById('nome').disabled = false;
                               document.getElementById('identificador').disabled = false;
                                   document.getElementById('rg').disabled = false;
                                       document.getElementById('telefone').disabled = false;
                                           document.getElementById('email').disabled = false;
                                               document.getElementById('obs').disabled = false;
                                                   document.getElementById('endereco').disabled = false;
                                                       document.getElementById('bairro').disabled = false;
                                                           document.getElementById('cidade').disabled = false;  
                                                             document.getElementById('estado').disabled = false;
                                                               document.getElementById('empresa').disabled = false;
                                                                  document.getElementById('placa').disabled = false;     
                                                                    }

        </script>
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

 <?php
           $chave = $_GET['chave'];
      date_default_timezone_set('America/Sao_Paulo');
              $connect = mysqli_connect('localhost','root','','portaria');
           mysqli_set_charset($connect,'utf8');
                $query_select = "SELECT * FROM visitantes where rg = '$chave' or identificador = '$chave' or nome like '$chave%'";
                     $select = mysqli_query($connect,$query_select);
                      $valor = mysqli_fetch_assoc($select);
        $data_dia = substr($valor['data_cadastro'],8,2);
          $data_mes = substr($valor['data_cadastro'],5,2);
            $data_ano = substr($valor['data_cadastro'],0,4);
      ?>    

  <div class="main" id="carrega_imagem">
     <span style="float:right;cursor:pointer;" onClick="document.getElementById('carrega_imagem').style.display = 'none';">X&nbsp;</span>
      <h1>Escolher uma foto</h1><br/>
    <hr>
     <form id="uploadimage" action="" method="post" enctype="multipart/form-data">
      <div id="image_preview"><img id="previewing" src="imagens/imagem.jpg" /></div>
       <hr id="line">
        <div id="selectImage">
       <label>Escolha uma Imagem</label><br/>
      <input type="file" name="file" id="file" required accept="image/*" />
     <input type="submit" value="Enviar" class="submit" />
    </div>
   </form>
  </div>

     <div id="tirar_foto">
        <script type="text/javascript">

            //Instanciando a webcam. O tamanho pode ser alterado

            document.write(webcam.get_html(320, 240));

        </script>

        <form>

            <input type=button value="Configurar" onClick="webcam.configure()">

            &nbsp;&nbsp;
            <input type=button value="Tirar Foto" onClick="take_snapshot()">

            &nbsp;&nbsp;
            <input type=button value="Reset" onClick="webcam.reset()">

            &nbsp;&nbsp;            <input type="button" value="Fechar" onClick="document.getElementById('tirar_foto').style.display = 'none';">
        </form>
      </div>
  <div id="flex_container"><div id="foto_resultado"><img id="img_foto" src="<?php echo $valor['foto'];?>" width="120" height="120"></div>
       <div style="margin-left:10px;">
           <input type="button" value="Tirar foto" id="btn_foto" onClick="document.getElementById('tirar_foto').style.display = 'block'" disabled />
             <input type="button" value="Carregar imagem" id="btn_carregar" onClick="document.getElementById('carrega_imagem').style.display = 'block';" disabled />
                   </div> 
                     <div style="margin-left: 10px;"><input type="button" value="Editar cadastro" onClick="habilita_edicao()" /></div>
                    </div>
  <fieldset><legend>Cadastro de visitantes</legend>
   <div id="form">
     <form action="alterar_cadastro.php" method="post" id="form_cadastro">
      <div id="col1">
    <label for="nome">Nome: </label><span>*</span><input type="text" id="nome" name="nome" value="<?php echo $valor['nome'];?>" required disabled />
      <label for="identificador">Identificador: </label><span>*</span><input type="text" id="identificador" name="identificador" value="<?php echo $valor['identificador'];?>" pattern="[0-9]+$" required disabled />
        <label for="rg">RG</label><span>*</span><input type="text" id="rg" name="rg" value="<?php echo $valor['rg'];?>" pattern="[0-9]+$" required disabled />
             <label for="telefone">Telefone</label><input type="text" id="telefone" name="telefone" value="<?php echo $valor['telefone'];?>" disabled />
               <label for="email">E-mail</label><input type="text" id="email" name="email" value="<?php echo $valor['telefone'];?>" disabled />
                  <label for="obs">Observa&ccedil;&atilde;o</label><input type="text" id="obs" name="obs" value="<?php echo $valor['obs'];?>" disabled />
                    </div>
                     <div id="col2">
                   <label for="endereco">Endere&ccedil;o:</label><input type="text" id="endereco" name="endereco" value="<?php echo $valor['endereco'];?>"disabled />
                     <label for="bairro">Bairro</label><input type="text" id="bairro" name="bairro" value="<?php echo $valor['bairro'];?>" disabled />
                       <label for="cidade">Cidade</label><input type="text" id="cidade" name="cidade" value="<?php echo $valor['cidade'];?>"disabled />
                         <label for="estado">Estado</label><input type="text" id="estado" name="estado" value="<?php echo $valor['estado'];?>"disabled />
                             <label for="empresa">Empresa</label><input type="text" id="empresa" name="empresa" value="<?php echo $valor['empresa'];?>" disabled />
                                <label for="placa">Placa</label><input type="text" id="placa" name="placa" value="<?php echo $valor['placa'];?>" disabled />  
          </div>
              <input type="hidden" name="input_foto" id="input_foto" value="<?php echo $valor['foto'];?>">
                 <input type="hidden" name="input_id" id="input_id" value="<?php echo $valor['id'];?>">
                 <input type="submit" id="btn_alterar" value="Alterar Cadastro" disabled />
                   </form><input type="button" id="btn_apagar" value="Apagar Cadastro" />
   </div>
  </div>
  </fieldset>
</body>
</html>







     
  

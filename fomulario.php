<?php 

   if(isset($_POST['submit'])){
        //  print_r('nome:' . $_POST['nome']);
        //  print_r('<br>');
        //  print_r('Email:' . $_POST['email']);
        //  print_r('<br>');
        //  print_r('telefone:' . $_POST['telefone']);
        //  print_r('<br>');
        //  print_r('Sexo:'. $_POST['genero']);
        //  print_r('<br>');
        //  print_r('Data de Nascimento:' . $_POST['data_nascimento']);
        //  print_r('<br>');
        //  print_r('Cidade:' . $_POST['cidade']);
        //  print_r('<br>');
        //  print_r('Estado:'. $_POST['estado']);
        //  print_r('<br>');
        //  print_r('Endereço:'. $_POST['endereco']);

        include_once('./Projeto_Web/sql/config.php');

        $nome =  $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        // $sexo =  $_POST['genero'];
        // $data_nasc = $_POST['data_nascimento'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $endereco = $_POST['endereco'];
        $curriculo = $_POST['curriculo'];

        if (isset($_FILES["curriculo"])) {

            // Obtém o arquivo enviado
            $arquivo = $_FILES["curriculo"];
          
            // Verifica se o arquivo é um PDF
            if ($arquivo["type"] == "application/pdf") {
          
              // Verifica se o arquivo é válido
              if ($arquivo["error"] == UPLOAD_ERR_OK) {
          
                // Salva o arquivo no disco
                move_uploaded_file($arquivo["tmp_name"], "curriculos/" . $arquivo["name"]);
          
                // Exibe uma mensagem de sucesso
                echo "O arquivo foi enviado com sucesso!";
              } else {
          
                // Exibe uma mensagem de erro
                echo "O arquivo enviado é inválido.";
              }
            } else {
          
              // Exibe uma mensagem de erro
              echo "O arquivo enviado não é um PDF.";
            }
          }
          

        $result = mysqli_query($conexao, "INSERT INTO candidatos(nome,email,telefone,cidade,estado,endereco,curriculo)values('$nome', '$email','$telefone', '$cidade','$estado', '$endereco', '$curriculo' )");

        header('Location: ./Projeto_Web/index.php');
   }


?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="pngtree-biker-skull-image-png-image_6212426.png" type="image/x-icon">
    <link rel="stylesheet" href="form.css">
    <title>Formulario</title>
    
       
</head>
<body>
    <img src="pngtree-biker-skull-image-png-image_6212426.png"  class="caveira">
    <div class="box">    
        <form action="./fomulario.php" method="POST">
            <fieldset>
                <legend><b>Trabalhe Conosco</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="labelInput">Nome Completo</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" required>
                    <label for="email" class="labelInput">Email</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" required>
                    <label for="telefone" class="labelInput">Telefone</label>
                </div>
                <!-- <p>Sexo:</p>
                <input type="radio" id="feminino" name="genero" value="feminino" required>
                <label for="feminino">Feminino</label>
                <br>
                <input type="radio" id="masculino" name="genero" value="masculino" required>
                <label for="masculino">Masculino</label>
                <br> -->
                <!-- <input type="radio" id="outro" name="genero" value="outro" required>
                <label for="outro">Outro</label> -->
                <!-- <br><br>
                <label for="data_nascimento"><b>Data de Nascimento:</b></label>
                <input type="date" name="data_nascimento" id="data_nascimento" required> -->
                <br><br>
                <div class="inputBox">
                    <input type="text" name="cidade" id="cidade" class="inputUser" required>
                    <label for="cidade" class="labelInput">Cidade</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="estado" id="estado" class="inputUser" required>
                    <label for="estado" class="labelInput">Estado</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="endereco" id="endereco" class="inputUser" required>
                    <label for="endereco" class="labelInput">Endereço</label>
                </div>
                <br>
                <div class="inputBox">
                <label for="curriculo">Envie seu curriculo</label>   
                <input type="file" name="curriculo" accept="application/pdf" placeholder="Currículo">
                
                
                </div>
                <br><br>
                <input type="submit" name="submit" id="submit" value="Enviar">
            </fieldset>
        </form>
    </div>
</body>
</html>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Editar</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col">
             <?php
                include "conexao.php";
                $id       = $_POST['id'];
                $nome     = $_POST['nome'];
                $endereco = $_POST['endereco'];
                $telefone = $_POST['telefone'];
                $email    = $_POST['email'];
                $dat_nasc = $_POST['dt_nascimento'];

                $sql = "UPDATE `pessoa` set `nome`= '$nome' ,`endereco`= '$endereco', `email`= '$email', `data_nasc`= '$dat_nasc', `telefone`= '$telefone' WHERE cod_pessoa = $id";
                
                if(mysqli_query($conn,$sql))
                    messagem("$nome editado com sucesso!",'success');
                else
                messagem("Não foi possivel editar $nome.",'danger');

             ?>           
             
             <a href="index.php" class="btn btn-primary">Voltar</a>
             
            </div>
        </div>
    </div>
    

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  </body>
</html>
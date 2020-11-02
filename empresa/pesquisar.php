<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Empresa</title>
</head>

<body>

    <?php
    if (isset($_POST['busca']))
        $pesquisa = $_POST['busca'];
    else
        $pesquisa = '';

    include "conexao.php";

    $sql = "SELECT * FROM pessoa WHERE nome LIKE '%$pesquisa%'";

    $dados = mysqli_query($conn, $sql);

    ?>

    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Pesquisar</h1>

                <nav class="navbar navbar-light bg-light">
                    <form class="form-inline" action="pesquisar.php" method="POST">
                        <input class="form-control mr-sm-2" type="search" placeholder="Nome" aria-label="Search" name="busca" autofocus>
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                    </form>
                </nav>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Endereço</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Funções</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($linha = mysqli_fetch_assoc($dados)) {
                            $cod_pes  = $linha['cod_pessoa'];
                            $nome     = $linha['nome'];
                            $endereco = $linha['endereco'];
                            $telefone = $linha['telefone'];
                            $email    = $linha['email'];

                            echo "<tr>
                                <th scope='row'>$nome</th>
                                <td>$endereco</td>
                                <td>$telefone</td>
                                <td>$email</td>
                                <td><a href= 'editar.php?id=$cod_pes' class= 'btn btn-success'>Editar</a>
                                    <a href= '' class= 'btn btn-danger' data-toggle='modal' data-target='#confirmacao'  onclick=".'"'."pegar_dados($cod_pes,'$nome')".'"'.">Excluir</a>
                                </td>
                              </tr>";
                        }

                        ?>
                    </tbody>
                </table>

                <a href="index.php" class="btn btn-primary">Voltar para o Inicio</a>

            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirmacao" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmação de Exclusão</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="excluir_script.php" method="POST">
                    <div class="modal-body">
                        <p>Deseja realmente excluir <b id="nome_pessoa">Nome</b>?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                        <input type="hidden" name="id" id="cod_pessoa" value="">
                        <input type="hidden" name="nome" id="nome_pes" value="">
                        <input type="submit" class="btn btn-danger" value="Sim">
                </form>
            </div>
        </div>
    </div>
    </div>

    <script type="text/javascript">
        function pegar_dados(id, nome){
            document.getElementById('nome_pessoa').innerHTML = nome;
            document.getElementById('cod_pessoa').value =id;
            document.getElementById('nome_pes').value = nome;
        }
    </script>


    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>

</html>
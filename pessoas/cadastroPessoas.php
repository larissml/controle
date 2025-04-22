<!doctype html>
<html lang="pt-br">
    <?php include 'cadastrarPessoasBD.php'; ?>
    <head>
        <meta charset="utf-8" />
        <title>Controle de gastos | Cadastrar pessoas</title>
        <link rel="stylesheet" type="text/css" href="style.css" media="screen" />
    </head>
    <body>
        <div class="formCadastro">
        <h1>Cadastrar pessoas</h1>
            <form class='cadastrarPessoas' action="cadastrarPessoasBD.php" method="post" enctype="multipart/form-data">
                <div class="inputs">
                        <label for="nome">Nome:</label>
                        <input type="text" id="nome" placeholder="Digite o nome completo" name="nome" class="nome"/>
                </div>
                <div class="inputs">
                    <label for="Identificador">Identificador</label>
                    <input type="number" id="Identificador" name="Identificador" class="Identificador" value="<?php echo $novoIdentificador; ?>" readonly />
                </div>
                <div class="inputs">
                    <label for="idade">Idade:</label>
                    <input type="number" id="idade" name="idade" />
                </div>
                <div class="row">
                    <div class="col-12 text-rigth">
                        <button type="submit">Cadastrar</button>
                        <button type="button" onclick="window.location.href='/controle-transacoes/home.php'">Voltar</button>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>
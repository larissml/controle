<!doctype html>
<html lang="pt-br">
<?php include 'C:\xampp\htdocs\controle-transacoes\queriesBD.php'; ?>
    <head>
        <meta charset="utf-8" />
        <title>Controle de gastos | Deletar pessoa</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <form action="deletarPessoasBD.php" method="post">
        <h1>Excluir pessoa selecionada</h1>
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Identificador</th>
                        <th>Idade</th>
                        <th>Selecionar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    /*percorrendo o array $pessoas que foi gerado através da query do arquivo querysBD e adicionando um input para ser selecionada*/
                    /*o formulario irá encaminhar para o arquivo deletarPessoasBD.php onde a pessoa e suas transações serão deletadas*/
                        if (!empty($pessoas))  {
                            foreach ($pessoas as $pessoa) {
                                echo "<tr>
                                    <td>{$pessoa['Nome']}</td>
                                    <td>{$pessoa['Identificador']}</td>
                                    <td>{$pessoa['Idade']}</td>
                                    <td><input type='radio' name='selecionado' value='{$pessoa['Identificador']}' required></td>
                                </tr>";
                        }
                    }; ?>
                </tbody>
                </table>
                <button type="submit">Excluir</button>
                <button type="button" onclick="window.location.href='/controle-transacoes/home.php'">Voltar</button>
            </form>
        </body>
    </html>
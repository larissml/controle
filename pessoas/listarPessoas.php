<!doctype html>
<html lang="pt-br">
<?php include 'C:\xampp\htdocs\controle-transacoes\queriesBD.php'; ?>
    <head>
        <meta charset="utf-8" />
        <title>Controle de gastos | Listar pessoas</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="ListarPessoas">
            <h1>Pessoas cadastradas</h1>
                <table>
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Identificador</th>
                            <th>Idade</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        /*percorrendo o array $pessoas que foi gerado através da query do arquivo querysBD e adicionando na tabela para realizar a listagem completa*/
                            if (!empty($pessoas))  {
                                foreach ($pessoas as $pessoa) {
                                    echo "<tr>
                                        <td>{$pessoa['Nome']}</td>
                                        <td>{$pessoa['Identificador']}</td>
                                        <td>{$pessoa['Idade']}</td>
                                    </tr>";
                            }
                        }; ?>
                </tbody>
            </table>
            <button type="button" onclick="window.location.href='/controle-transacoes/home.php'">Voltar</button>
        </div>

        </body>
    </html>
<!doctype html>
<html lang="pt-br">
<?php include 'C:\xampp\htdocs\controle-transacoes\queriesBD.php'; ?>
    <head>
        <meta charset="utf-8" />
        <title>Controle de gastos | Listar Pessoas</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="ListarPessoas">
            <h1>Transaçoes cadastradas</h1>
                <table>
                    <thead>
                        <tr>
                            <th>Identificador</th>
                            <th>Tipo</th>
                            <th>Valor</th>
                            <th>Descricao</th>
                            <th>Pessoa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        /*percorrendo o array $pessoas que foi gerado através da query do arquivo querysBD e adicionando na tabela para realizar a listagem completa*/
                            if (!empty($transacoes))  {
                                foreach ($transacoes as $transacao) {
                                    echo "<tr>
                                        <td>{$transacao['Identificador']}</td>
                                        <td>{$transacao['Tipo']}</td>
                                        <td>{$transacao['Valor']}</td>
                                        <td>{$transacao['Descricao']}</td>
                                        <td>{$transacao['Pessoa']}</td>
                                    </tr>";
                            }
                        }; ?>
                </tbody>
            </table>
            <button type="button" onclick="window.location.href='/controle-transacoes/home.php'">Voltar</button>
        </div>

        </body>
    </html>
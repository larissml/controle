<!DOCTYPE html>
<html lang="pt-br">
<?php include 'C:\xampp\htdocs\controle-transacoes\queriesBD.php'; ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Extrato</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Consulta de totais</h2>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Total de Receitas</th>
                    <th>Total de Despesas</th>
                    <th>Saldo</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $totalReceitasGeral = 0;
                $totalDespesasGeral = 0;

                if (!empty($pessoas)) {
                    foreach ($pessoas as $pessoa) {
                        /*transformando o id em inteiro*/
                        $pessoaID = (int)$pessoa['Identificador']; 

                        $totalReceitas = 0;
                        $totalDespesas = 0;

                        /*filtrar as transações da pessoa*/
                        foreach ($transacoes as $transacao) {
                            if ((int)$transacao['Pessoa'] === $pessoaID) {  
                                /*trabalhando com a categoria da transação*/
                                if ($transacao['Tipo'] == 'receita') {
                                    $totalReceitas += (float)$transacao['Valor']; 
                                } elseif ($transacao['Tipo'] == 'despesa') {
                                    $totalDespesas += (float)$transacao['Valor']; 
                                }
                            }
                        }
                        /*calculando o total geral*/
                        $saldo = $totalReceitas - $totalDespesas;
                        $totalReceitasGeral += $totalReceitas;
                        $totalDespesasGeral += $totalDespesas;

                        /*exibindo os dados da consulta*/
                        echo "<tr>
                                <td>{$pessoa['Nome']}</td>
                                <td>R$ " . number_format($totalReceitas, 2, ',', '.') . "</td>
                                <td>R$ " . number_format($totalDespesas, 2, ',', '.') . "</td>
                                <td>R$ " . number_format($saldo, 2, ',', '.') . "</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4' class='text-center'>Nenhuma pessoa encontrada</td></tr>";
                }

                $saldoGeral = $totalReceitasGeral - $totalDespesasGeral;
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Total Geral</th>
                    <th>R$ <?= number_format($totalReceitasGeral, 2, ',', '.') ?></th>
                    <th>R$ <?= number_format($totalDespesasGeral, 2, ',', '.') ?></th>
                    <th>R$ <?= number_format($saldoGeral, 2, ',', '.') ?></th>
                </tr>
            </tfoot>
        </table>
        <button type="button" onclick="window.location.href='/controle-transacoes/home.php'">Voltar</button>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>

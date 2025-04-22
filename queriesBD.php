<?php
/*queries utilizadas nos arquivos de listar pessoas, listar transacoes, consultas de totais e etc*/
$conn = mysqli_connect('localhost', 'root', '', 'controledegastos');

/*buscar e retornar todas pessoas cadastradas na tabela */
$consultaPessoas = $conn->query("SELECT * FROM pessoa");
$pessoas = [];
if ($consultaPessoas->num_rows >0) {
    while ($linhaPessoas= $consultaPessoas->fetch_assoc()) {
        $pessoas[] = $linhaPessoas;
    }
}

/*buscar todas transacoes*/

$consultaTransacoes = $conn->query("SELECT * FROM transacao");
$transacoes= [];
if ($consultaTransacoes !== false && $consultaTransacoes->num_rows > 0){
    while($linhaTransacoes=$consultaTransacoes->fetch_assoc()){
        $transacoes[] = $linhaTransacoes;
    }
}


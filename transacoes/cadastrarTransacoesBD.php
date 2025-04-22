<?php
    /*buscando os dados do formulario*/
    $valor = $_POST['valor'] ?? null;
    $categoria = $_POST['categoria'] ?? 'Despesa'; /*correção do erro de 'vazio' se a pessoa é menor de idade, garantindo que seja preenchido como despesa independente*/
    $pessoaID = $_POST['pessoaSelecionada'] ?? null;
    $descricao = $_POST['Descricao'] ?? null;

    

    /*procurando e incrementando o identificador para realizar o cadastro*/
    $conn = mysqli_connect('localhost', 'root', '', 'controledegastos') or die('Erro ao conectar ao BD: ' . mysqli_connect_error());
    $consulta = $conn->query("SELECT Identificador FROM transacao ORDER BY Identificador DESC LIMIT 1");
    if($consulta && mysqli_num_rows($consulta) > 0) {
        $dados = mysqli_fetch_assoc($consulta);
        $novoIdentificadorTr = ($dados['Identificador'] ?? 0 )+ 1;
    } else {
        $novoIdentificadorTr = 1; 
    }

    /*realizando o insert de transações na tabela Transação do BD*/
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $query = mysqli_query($conn, "INSERT INTO transacao (Identificador, Descricao, Valor, Tipo, Pessoa) VALUES ('$novoIdentificadorTr', '$descricao','$valor', '$categoria', $pessoaID)");
        if($query) 
            echo "<script>alert('Cadastro realizado!');</script>";
        else 
            echo "<script>alert('ERROR');</script>";
    
        }

 mysqli_close($conn);

?>
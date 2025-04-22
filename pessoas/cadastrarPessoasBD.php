<?php
    $nome = $_POST['nome'] ?? null;
    $idade = $_POST['idade'] ?? null;

    /*procurando e incrementando o identificador para realizar o cadastro*/
    $conn = mysqli_connect('localhost', 'root', '', 'controledegastos') or die('Erro ao conectar ao BD: ' . mysqli_connect_error());
    $consulta = $conn->query("SELECT Identificador FROM pessoa ORDER BY Identificador DESC LIMIT 1");
    if($consulta && mysqli_num_rows($consulta) > 0) {
        $dados = mysqli_fetch_assoc($consulta);
        $novoIdentificador = ($dados['Identificador'] ?? 0 )+ 1;
    } else {
        $novoIdentificador = 1; 
    }



    /*realizando o insert de pessoas na tabela Pessoas do BD*/
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $query = mysqli_query($conn, "INSERT INTO pessoa (nome, identificador,idade) VALUES ('$nome', '$novoIdentificador','$idade')");
        if($query) 
            echo "<script>alert('Cadastro realizado!');</script>";
        else 
            echo "<script>alert('ERROR');</script>";
    
        }

 mysqli_close($conn);

?>
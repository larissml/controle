<?php
/*aqui iremos deletar a pessoa selecionada no arquivo deletarPessoas.php. tudo baseado no ID*/
    $id = $_POST['selecionado'] ?? null;
    
    $conn = mysqli_connect('localhost', 'root', '', 'controledegastos') or die('Erro ao conectar ao BD: ' . mysqli_connect_error());

    if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($id)) {
        /* antes de deletar a pessoa precisamos deletar as transações dela*/
        $queryTransacao = mysqli_query($conn, "DELETE FROM transacao WHERE Pessoa = '$id'");

        if ($queryTransacao) {
            /* deletando pessoa selecionada*/
            $queryPessoa = mysqli_query($conn, "DELETE FROM pessoa WHERE Identificador = '$id'");

            if ($queryPessoa) {
                echo "<script>alert('Pessoa excluída com sucesso!');</script>";
            } else {
                echo "<script>alert('Erro ao excluir pessoa.');</script>";
            }
        } else {
            echo "<script>alert('Erro ao excluir transações.);</script>";
        }
    } else {
        echo "<script>alert('Nenhuma pessoa foi selecionada.');</script>";
    }

    mysqli_close($conn);
?>

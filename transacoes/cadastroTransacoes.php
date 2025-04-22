<!doctype html>
<html lang="pt-br">
    <?php include 'C:\xampp\htdocs\controle-transacoes\pessoas\cadastrarPessoasBD.php'; ?>
    <?php include 'C:\xampp\htdocs\controle-transacoes\transacoes\cadastrarTransacoesBD.php'; ?>
    <?php include 'C:\xampp\htdocs\controle-transacoes\queriesBD.php'; ?>
    <head>
        <meta charset="utf-8" />
        <title>Controle de gastos | Cadastrar transações</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style.css" media="screen" />
    </head>
    <body>
        <div class="formCadastro">
        <h1>Cadastrar transações</h1>
            <form class='cadastrarTransacoes' action="cadastrarTransacoesBD.php" method="post" enctype="multipart/form-data">
                <div class="inputs">
                    <label for="Identificador">ID da Transação</label>
                    <input type="number" id="Identificador" name="Identificador" class="Identificador" value="<?php echo $novoIdentificadorTr; ?>" readonly />
                </div>
                <div class="inputs">

                    <!-- modal para realizar a seleção da pessoa responsável pela transação -->

                    <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#modalExemplo"> Selecionar pessoa responsável </button>
                    <div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="pessoaSelecionada">Escolha uma pessoa:</label>
                                    <select class="form-control" id="pessoaSelecionada" name="pessoaSelecionada">
                                        <option value="">Selecione...</option>
                                        <?php
                                        if (!empty($pessoas)) {
                                            foreach ($pessoas as $linhaPessoas) {
                                                echo '<option value="' . $linhaPessoas['Identificador'] . '" data-idade="' . $linhaPessoas['Idade'] . '">' . $linhaPessoas['Nome'] . '</option>';
                                            }
                                        } else {
                                            echo '<option value="">Nenhuma pessoa encontrada</option>';
                                        }
                                        ?>
                                    </select>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                <button type="button" class="btn btn-primary" id="selecionarPessoa">Selecionar</button>
                            </div>
                            </div>
                        </div>
                        </div>

                        <!--fim do modal -->
                        
                    </div>
                <div class="inputs">
                    <label for="valor">Valor:</label>
                    <input type="number" id="valor" name="valor" />
                </div>
                <div class="inputs">
                    <label for="tipo">Tipo de transação:</label>
                    <select id="tipo" class='botoes-categoria' name="categoria">
                    <?php 
                    /*verificação da idade da pessoa selecionada através do modal, isso para desbloquear as opções permitidas*/
                        if (!$maiorIdade) {
                            echo "<option value='Despesa' selected>Despesa</option>";
                            echo "<option value='Receita' disabled>Receita</option>";
                        } else {
                            echo "<option value='Despesa'>Despesa</option>";
                            echo "<option value='Receita'>Receita</option>";
                        }
                            ?>
                    </select>
                </div>
                <div class="inputs">
                        <label for="Descricao">Descrição:</label>
                        <input type="text" id="Descricao" placeholder="Digite a descrição do lançamento" name="Descricao" class="Descricao"/>
                </div>
                <div class="row">
                    <div class="col-12 text-rigth">
                        <input type="hidden" id="PessoaID" name="PessoaID">
                        <button type="submit" class="btn-cadastrar">Cadastrar</button>
                        <button type="button" onclick="window.location.href='/controle-transacoes/home.php'">Voltar</button>
                    </div>
                </div>
            </form>
        </div>
        <script>
            document.getElementById('selecionarPessoa').addEventListener('click', function() {
                /*pegar a pessoa selecionada dentro do modal e + a idade para realizar a verificação */
                let selectPessoa = document.getElementById('pessoaSelecionada');
                let pessoaSelecionada = selectPessoa.options[selectPessoa.selectedIndex];
                let idade = pessoaSelecionada.getAttribute('data-idade');
                let pessoaID = selectPessoa.value;

                if (pessoaID) {
                    document.getElementById('PessoaID').value = pessoaID;
                }
                
                if (idade && parseInt(idade) < 18) {
                    let selectTipo = document.getElementById('tipo');
                    selectTipo.innerHTML = "<option value='Despesa' selected>Despesa</option>";
                    selectTipo.disabled = true;
                } else {
                    let selectTipo = document.getElementById('tipo');
                    selectTipo.innerHTML = `
                        <option value='Despesa'>Despesa</option>
                        <option value='Receita'>Receita</option>
                    `;
                    selectTipo.disabled = false;
                }

                /*garantindo que se a pessoa for menor de idade o valor do Tipo da transação seja despesa*/
                if (idade && parseInt(idade) < 18) {
                    document.getElementById('tipo').value = 'Despesa';
                }
                
                $('#modalExemplo').modal('hide');
            });

            </script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>
<div class="conteudo" id="conteudo1">
    <div class="info-tela">
        <h5>Painel</h5>
        <div class="local">
            <h6><a href="../DASHBOARD/adminDash.php">Painel</a> > <mark>Inicio</mark></h6>
        </div>
    </div>
    <div class="card-encl">
        <div class="cardS azul">
            <div class="card-title">
                <h6 class="azulT">Vendas Feitas</h6>
                <h4>40</h4>
            </div>
            <div class="card-foto">
                <img src="../../IMG/down-arrow.png" alt="">
            </div>
            <!-- <hr> -->
        </div>
        <div class="cardS vermelho">
            <?php

            $selectQ = "SELECT * FROM usuario";
            $selectP = $cx->prepare($selectQ);
            $selectP->execute();
            $total = $selectP->rowCount();

            ?>
            <div class="card-title">
                <h6 class="vermelhoT">Usuarios Cadastrados</h6>
                <?php echo "<h4>$total</h4>"; ?>
            </div>
            <div class="card-foto">
                <img src="../../IMG/folder.png" alt="">
            </div>
            <!-- <hr> -->
        </div>

        <div class="cardS verde">
            <?php

            $selectQ = "SELECT * FROM usuario WHERE premium = '1'";
            $selectP = $cx->prepare($selectQ);
            $selectP->execute();
            $total = $selectP->rowCount();

            ?>
            <div class="card-title">
                <h6 class="verdeT">Contas Premium</h6>
                <?php echo "<h4>$total</h4>"; ?>
            </div>
            <div class="card-foto">
                <img src="../../IMG/coroaPremium.png" alt="" id="fotocard">
            </div>
            <!-- <hr> -->
        </div>
        <div class="cardS laranja">
            <div class="card-title">
                <h6 class="laranjaT">Perguntas N.R</h6>
                <h4>40</h4>
            </div>
            <div class="card-foto">
                <img src="../../IMG/question-sign.png" alt="">
            </div>
            <!-- <hr> -->
        </div>
    </div>
    <div class="listas">
        <div class="row">
            <div class="col-md-6">


                <div class="listUsu">
                    <h5>Últimos Usuários Cadastrados</h5>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Nº</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Situação</th>
                                <th scope="col">CNPJ/CPF</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $selectP = "SELECT * FROM usuario ORDER BY idUsu DESC LIMIT 5";
                            $selectP = $cx->prepare($selectP);
                            $selectP->setFetchMode(PDO::FETCH_ASSOC);
                            $selectP->execute();
                            $total = $selectP->rowCount();

                            if ($total == 0) {
                                echo "<p class='bloqueado'>Não há registros no momento...</p>";
                            } else {
                                while ($dados = $selectP->fetch()) {
                                    echo "<tr>";
                                    echo "<td scope='row'>{$dados['idUsu']}</td>";
                                    echo "<td>{$dados['nomeUsu']}</td>";
                                    if ($dados['ativo'] == 1) {
                                        echo "<td class='ativo'>Ativo</td>";
                                    } else {
                                        echo "<td class='bloqueado'>Bloqueado</td>";
                                    }
                                    echo "<td>{$dados['NRCIR']} - {$dados['TCIR']}</td>";
                                    echo "</tr>";
                                }
                            }


                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <div class="prodlist">
                    <h5>Últimos Produtos Comprados</h5>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Nº</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Situação</th>
                                <th scope="col">Preço</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">1</td>
                                <td>Banana Prata</td>
                                <td class="emProc">Em processamento</td>
                                <td>R$20,90</td>
                            </tr>
                            <tr>
                                <td scope="row">2</td>
                                <td>Maracujá</td>
                                <td class="emProc">Em processamento</td>
                                <td>R$15,20</td>
                            </tr>
                            <tr>
                                <td scope="row">3</td>
                                <td>Maçã</td>
                                <td class="Desistencia">Desistencia</td>
                                <td>R$10,00</td>
                            </tr>
                            <tr>
                                <td scope="row">4</td>
                                <td>Kiwí</td>
                                <td class="Desistencia">Desistencia</td>
                                <td>R$10,00</td>
                            </tr>
                            <tr>
                                <td scope="row">5</td>
                                <td>Manga</td>
                                <td class="Desistencia">Desistencia</td>
                                <td>R$10,00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
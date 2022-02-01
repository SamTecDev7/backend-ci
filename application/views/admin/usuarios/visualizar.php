<style>
    ul li {
        margin: 0 auto;
    }
</style>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon card-header-primary">
                <div class="card-icon">
                    <i class="fa fa-user fa-2x"></i>
                </div>
                <h4 class="card-title ">Visualizar Usuário</h4>
            </div>
            <div class="card-body">
                <div class="table">
                    <section class="panel">
                        <div class="panel-body">

                            <ul  class="nav nav-pills">
                                <li class="active">
                                    <a href="#info" data-toggle="tab">Informações do usuário</a>
                                </li>
                                <li>
                                    <a href="#plano" data-toggle="tab">Plano de Carreira</a>
                                </li>
                                <li>
                                    <a href="#binario" data-toggle="tab">Pontuação</a>
                                </li>
                                <li>
                                    <a href="#extrato" data-toggle="tab">Extrato</a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane active" id="info">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h3 class="text-center text-uppercase">Cadastro/Informações Pessoais</h3>
                                            <table class="table table-striped">
                                                <tr>
                                                    <td>Login</td>
                                                    <td><?php echo $usuario['usuario']->login; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Nome</td>
                                                    <td><?php echo $usuario['usuario']->nome; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Patrocinador</td>
                                                    <td><?php echo (Patrocinador($usuario['usuario']->id)) ? InformacoesUsuario('login', Patrocinador($usuario['usuario']->id)) : 'Desconhecido'; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Email</td>
                                                    <td><?php echo $usuario['usuario']->email; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>CPF</td>
                                                    <td><?php echo $usuario['usuario']->cpf; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Celular</td>
                                                    <td><?php echo $usuario['usuario']->celular; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Bloqueado?</td>
                                                    <td><?php echo ($usuario['usuario']->block == 1) ? 'Sim' : 'Não'; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Membro desde</td>
                                                    <td><?php echo date('d/m/Y H:i:s', strtotime($usuario['usuario']->data_cadastro)); ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-sm-6">
                                            <h3 class="text-center text-uppercase">Financeiro</h3>
                                            <table class="table table-striped">
                                                <tr>
                                                    <td>Saldo</td>
                                                    <td>USD <?php echo number_format($usuario['usuario']->saldo, 2, ".", ","); ?></td>
                                                </tr>

                                                <tr>
                                                    <td>Saldo de rede</td>
                                                    <td>USD <?php echo number_format($usuario['usuario']->saldo_rede, 2, ".", ","); ?></td>
                                                </tr>

                                                <tr>
                                                    <td>Total investido</td>
                                                    <td>USD <?php echo $usuario['usuario']->totalinvestido; ?></td>
                                                </tr>

                                                <tr>
                                                    <td>Total de saques</td>
                                                    <td>USD <?php echo $usuario['usuario']->totalsaques; ?></td>
                                                </tr>





                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="row tab-pane" id="contas">
                                    <div style="margin: auto;" class="col-sm-10">
                                        <h3 class="text-center text-uppercase">Contas de pagamento</h3>

                                        <?php
                                        if (isset($usuario['contas'])) {
                                            foreach ($usuario['contas'] as $conta) {
                                                ?>
                                                <div class="panel panel-default" style="display: flex;">
                                                    <div class="panel-heading" style="margin: auto;" role="tab" id="heading_<?php echo $conta->id; ?>">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_<?php echo $conta->id; ?>" aria-expanded="false" aria-controls="collapse_<?php echo $conta->id; ?>">
                                                                <?php
                                                                if ($conta->categoria_conta == 1) {
                                                                    echo BancoPorID($conta->codigo_banco);
                                                                } else {
                                                                    echo 'Depósito via Bitcoin';
                                                                }
                                                                ?>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapse_<?php echo $conta->id; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_<?php echo $conta->id; ?>">
                                                        <div class="panel-body">
                                                            <?php
                                                            if ($conta->categoria_conta == 1) {
                                                                echo 'Banco: ' . BancoPorID($conta->codigo_banco) . '<br />';
                                                                echo 'Agência: ' . $conta->agencia . ' ' . ((!empty($conta->agencia_digito)) ? '-' . $conta->agencia_digito : '') . '<br />';
                                                                echo 'Conta: ' . $conta->conta . ' ' . ((!empty($conta->conta_digito)) ? '-' . $conta->conta_digito : '') . '<br />';
                                                                if (!empty($conta->operacao) && !is_null($conta->operacao)) {
                                                                    echo 'Op: ' . $conta->operacao . '<br />';
                                                                }

                                                                echo 'Tipo de conta: ';
                                                                echo ($conta->tipo_conta == 1) ? 'Conta Corrente <br />' : 'Poupança <br />';

                                                                echo 'Documento: ' . $conta->documento . '<br />';
                                                            } else {
                                                                echo 'Endereço Bitcoin: ' . $conta->carteira_bitcoin;
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        } else {
                                            echo '<div class="alert alert-danger text-center">Usuário ainda não cadastrou contas para recebimento.</div>';
                                        }
                                        ?>
                                    </div>
                                </div>


                                <div class="row tab-pane" id="plano">
                                    <div style="margin: auto;" class="col-sm-10">
                                        <h3 class="text-center text-uppercase">Plano de Carreira</h3>

                                        <?php
                                        if (isset($usuario['plano_carreira'])) {
                                            ?>
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Plano de Carreira</th>
                                                        <th>Data</th>
                                                    </tr>
                                                </thead>

                                                <tbody>

                                                    <?php
                                                    foreach ($usuario['plano_carreira'] as $plano) {
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $plano->nome; ?></td>
                                                            <td><?php echo date('d/m/Y H:i:s', strtotime($plano->data)); ?></td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                            <?php
                                        } else {
                                            echo '<div class="alert alert-danger text-center">Nenhum plano de carreira registro para esse usuário. Contate o programador.</div>';
                                        }
                                        ?>
                                    </div>
                                </div>



                                <div class="row tab-pane" id="binario">
                                    <div style="margin: auto;" class="col-sm-10">
                                        <div class="text-center text-uppercase">
                                        <h3 class="">Pontuação</h3>
                                        <a class="btn btn-success btn-sm" href="<?php echo base_url('admin/usuarios/pontos/' . $usuario['usuario']->id); ?>">Adicionar Pontos</a>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Total de pontos</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><?php echo $usuario['binario']['esquerdo']; ?> ponto(s)</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="col-sm-6">
                                                <?php
                                                if (isset($usuario['plano'])) {
                                                    ?>
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>Plano</th>
                                                                <th>Data Pagamento</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td><?php echo $usuario['plano']->nome; ?></td>
                                                                <td><?php echo date('d/m/Y', strtotime($usuario['plano']->data_pagamento)); ?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <?php
                                                } else {
                                                    echo '<div class="text-danger text-center">Nenhum plano ativo no momento.</div>';
                                                }
                                                ?>
                                            </div>
                                        </div>

                                    </div>
                                </div>



                                <div class="tab-pane" id="extrato">
                                    <div style="margin: auto;" class="col-sm-10">
                                        <h3 class="text-center text-uppercase">EXTRATO</h3>
                                        <?php
                                        if (isset($usuario['extrato'])) {
                                            ?>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead class=" text-primary">
                                                        <tr>
                                                            <th>
                                                                #
                                                            </th>
                                                            <th>
                                                                Descrição
                                                            </th>
                                                            <th>
                                                                Valor
                                                            </th>
                                                            <th>
                                                                Data
                                                            </th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        foreach ($usuario['extrato'] as $extrato) {
                                                            ?>
                                                            <tr>
                                                                <td>
                                                                    #<?php echo $extrato->id; ?>
                                                                </td>
                                                                <td>
                                                                    <span class="text-<?php echo ($extrato->tipo == 1) ? 'success' : 'danger'; ?>"><?php echo $extrato->mensagem; ?></span>
                                                                </td>
                                                                <td>
                                                                    <span class="text-<?php echo ($extrato->tipo == 1) ? 'success' : 'danger'; ?>"><?php echo ($extrato->tipo == 1) ? '+' : '-'; ?> R$ <?php echo number_format($extrato->valor, 2, ",", "."); ?></span>
                                                                </td>
                                                                <td>
                                                                    <?php echo date('d/m/Y H:i:s', strtotime($extrato->data)); ?>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table></div>
                                            <?php
                                        } else {
                                            echo '<div class="alert alert-danger text-center">Nenhuma movimentação de conta para esse usuário.</div>';
                                        }
                                        ?>
                                    </div>








                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
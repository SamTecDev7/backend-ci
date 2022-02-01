<div class="container">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">money</i>
                    </div>
                    <h4 class="card-category">Entradas hoje</h4>
                    <h3 class="card-title text-right"><small class="card-category">USD:</small> <?php echo $rendimentos_hoje; ?>
                    </h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        Valores que entraram hoje
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <h4 class="card-category">Usuários
                    </h4>
                    <h3 class="card-title text-right"><?php echo $total_usuarios; ?>
                    </h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        Usuários no sistema
                    </div>
                </div>
            </div>
        </div>


        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                        <i class="fa fa-bullhorn"></i>
                    </div>
                    <h4 class="card-category">Pacotes Ativos
                    </h4>
                    <h3 class="card-title text-right"><?php echo $planos_ativos; ?>
                    </h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        Pacotes comprados e ativos
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                    <div class="card-icon">
                        <i class="fa fa-archive"></i>
                    </div>
                    <h4 class="card-title">Saque Pendentes
                    </h4>
                    <h3 class="card-title text-right"><?php echo $saques_pendentes; ?>
                    </h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        Total de Saques pendentes 
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">money</i>
                    </div>
                    <h4 class="card-category">Entradas total</h4>
                    <h3 class="card-title text-right"><small class="card-category">USD:</small> <?php echo $entradas; ?>
                    </h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        Valores que entraram de todos os pacotes ativos
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">money</i>
                    </div>
                    <h4 class="card-category">Saldos</h4>
                    <h3 class="card-title text-right"><small class="card-category">USD:</small> <?php echo number_format($total,2,',','.'); ?>
                    </h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        Valores dos rendimentos de todos os usuários
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">money</i>
                    </div>
                    <h4 class="card-category">Total de saidas</h4>
                    <h3 class="card-title text-right"><small class="card-category">USD:</small> <?php echo $totalsaques; ?>
                    </h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        Valores referente aos debitos dos usuarios(saques,taxas e ativações com saldo)
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon card-header-info">
                <div class="card-icon">
                    <i class="fa fa-bell fa-2x"></i>
                </div>
                <h4 class="card-title ">Últimas 20 notificações para administração</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <tr>
                                <th>Notificação</th>
                                <th>
                                    Data
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($notificacoes !== false) {
                                foreach ($notificacoes as $notificacao) {
                                    ?>
                                    <tr>
                                        <td><?php echo $notificacao->mensagem; ?></td>
                                        <td><?php echo date('d/m/Y H:i:s', strtotime($notificacao->data)); ?></td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon card-header-warning">
                <div class="card-icon">
                    <i class="fa fa-ticket fa-2x"></i>
                </div>
                <h4 class="card-title ">Tickets</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table">
                        <thead class=" text-primary">
                            <tr>
                                <th>
                                    Login
                                </th>
                                <th>
                                    Assunto
                                </th>
                                <th>
                                    Última atualização
                                </th>
                                <th>
                                    Data da criação
                                </th>
                                <th>
                                    Status
                                </th>
                                <th>

                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($tickets !== false) {
                                foreach ($tickets as $ticket) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo InformacoesUsuario('login', $ticket->id_usuario); ?>
                                        </td>
                                        <td>
                                            <?php echo $ticket->assunto; ?>
                                        </td>
                                        <td>
                                            <?php echo date('d/m/Y H:i:s', strtotime($ticket->ultima_atualizacao)); ?>
                                        </td>
                                        <td>
                                            <?php echo date('d/m/Y H:i:s', strtotime($ticket->data_criado)); ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($ticket->status == 1) {
                                                echo '<span class="text-warning">Esperando sua resposta</span>';
                                            } elseif ($ticket->status == 2) {
                                                echo '<span class="text-success">Respondido pelo suporte</span>';
                                            } else {
                                                echo '<span class="text-danger">Ticket Fechado</span>';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <a class="btn btn-success" href="<?php echo base_url('admin/tickets/visualizar/' . $ticket->id); ?>"><i class="fa fa-eye"></i> Visualizar</a>
                                        </td>
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
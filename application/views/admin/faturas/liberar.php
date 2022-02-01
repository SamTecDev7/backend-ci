<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon card-header-info">
                <div class="card-icon">
                    <i class="fa fa-file-text-o fa-2x"></i>
                </div>
                <h4 class="card-title ">Faturas a Liberar</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table">
                        <thead class=" text-primary">
                            <tr><th>
                                    Nome do usuário
                                </th>
                                <th>
                                    Login
                                </th>
                                <th>
                                    Valor
                                </th>
                                <th>
                                    &nbsp;
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($faturas !== false) {
                                foreach ($faturas as $fatura) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo InformacoesUsuario('nome', $fatura->id_usuario); ?>
                                        </td>
                                        <td>
                                            <?php echo InformacoesUsuario('login', $fatura->id_usuario); ?>
                                        </td>
                                        <td>
                                            USD <?php echo ($fatura->teto <> 0) ? number_format($fatura->valor, 2, '.', ',') . ' em cotas' : number_format($fatura->valor, 2, '.', ',') . ' em lifecoins'; ?>
                                        </td>
                                        <td>
                                            <a class="btn btn-info" href="<?php echo base_url('uploads/' . $fatura->comprovante); ?>" target="_blank"><i class="fa fa-picture"></i> Comprovante</a>

                                            <a class="btn btn-success" href="<?php echo base_url('admin/faturas/liberar/' . $fatura->id); ?>"><i class="fa fa-check"></i> Liberar</a>
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
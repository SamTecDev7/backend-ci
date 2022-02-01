<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon card-header-info">
                <div class="card-icon">
                    <i class="fa fa-file-text-o fa-2x"></i>
                </div>
                <h4 class="card-title ">Faturas Pendentes</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table">
                        <thead class=" text-primary">
                            <tr>
                                <th>
                                    Nome do usuário
                                </th>
                                <th>
                                    Login
                                </th>
                                <th>
                                    Valor
                                </th>
                                <th>
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($faturas !== false) {
                                foreach ($faturas as $fatura) {
                                    ?>
									<?php if ($fatura->valor > 0): ?>
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
                                            <a class="btn btn-success" href="<?php echo base_url('admin/faturas/liberar/' . $fatura->id); ?>"><i class="fa fa-check"></i> Liberar</a>
                                        </td>
										<?php endif; ?>
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
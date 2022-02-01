<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon">
                <div class="card-icon">
                    <i class="fa fa-cog fa-2x"></i>
                </div>
                <h4 class="card-title ">Alterar valor da fatura || <?php echo InformacoesUsuario('nome', $fatura->id_usuario); ?></h4>
            </div>
            <div class="card-body">
                <?php if (isset($message)) echo $message; ?>
                <form action="" method="post" class="form-horizontal form-variance">

                    <div class="row">
                        <b class="col-sm-2 col-form-label">Forma de pagamento</b>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <div class="form-control">
                                    <?php echo $fatura->forma_pagamento; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <b class="col-sm-2 col-form-label">Data de pagamento</b>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <div class="form-control">
                                    <?php echo date('d/m/Y', strtotime($fatura->data_pagamento)); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label">Valor da fatura
                        </label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <input type="text" name="valor" id="valor" class="form-control" value="<?php echo $fatura->valor; ?>" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label">&nbsp;
                        </label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <input type="submit" class="btn btn-success" name="submit" value="Atualizar">
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

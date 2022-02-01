<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon">
                <div class="card-icon">
                    <i class="fa fa-trophy fa-2x"></i>
                </div>
                <h4 class="card-title "><?php echo $usuario['usuario']->nome ?></h4>
            </div>
            <div class="card-body">
                <?php if (isset($message)) echo $message; ?>
                <form action="" method="post" class="form-horizontal form-variance">
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Quantidade de pontos
                        </label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <input type="text" name="pontos" class="form-control" value="" autocomplete="off" required>
                                <small>Números inteiros, ex: 100</small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label">&nbsp;
                        </label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <input type="submit" class="btn btn-success" name="submit" value="Adicionar">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
